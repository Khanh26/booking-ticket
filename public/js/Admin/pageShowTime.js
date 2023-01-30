var checkFrom = false;
var numberDay = 0;
const editModal = document.querySelector('#editModal')
function reload() {
    dataTablesLoadShowTime('#tableShowTime', [
        { "width": "7%" },
        { "width": "12%" },
        null,
        { "width": "10%" },
        { "width": "10%" },
        { "width": "10%" },
        { "width": "10%" },
    ]);
    addEventBtn();
}

console.log()
// init
function defaultDay() {
    let now = new Date();
    let week = new Date();
    week.setDate(week.getDate() + 7);
    document.querySelector('.span-prevDay').textContent = `${now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear()}`
    document.querySelector('.span-nextDay').textContent = `${week.getDate() + "/" + (week.getMonth() + 1) + "/" + week.getFullYear()}`
}


function subRenderTable(data, dayShow) {
    let html = data.map((item) => {
        return `
        <tr>
            <td class="d-none"></td>
            <td>${item.TIME_START.substring(0, item.TIME_START.length - 3)} - ${item.TIME_END.substring(0, item.TIME_END.length - 3)}</td>
            <td>${item.movie.NAME_MOVIE}</td>
            <td>${item.room.NAME_ROOM}</td>
            <td>${item.PRICE_SHOWTIME}</td>
            <td><button class="btn btn-danger btnRemove" title="Xoá" value="${item.ID_SHOWTIME}" name="btnEdit" ${new Date(dayShow) < new Date() ? 'disabled' : ''}><i class="fas fa-trash"></i></button></td></td>
            <td><button class="btn btn-success btnEdit" title="Chỉnh sửa" value="${item.ID_SHOWTIME}" name="btnEdit" ${new Date(dayShow) < new Date() ? 'disabled' : ''} data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></button></td>
        </tr>
        `
    }).join('');
    return html;
}


function renderTables(data) {
    let html = data.map((item) => {
        const [item1, ...itemShowtime] = item.SHOWTIME;
        return `
        <tr>
            <td rowspan="${item.SHOWTIME.length}">${new Date(item.DAY_SHOWTIME).getDate() + "/" + (new Date(item.DAY_SHOWTIME).getMonth() + 1) + "/" + new Date(item.DAY_SHOWTIME).getFullYear()}</td>
            <td>${item1.TIME_START.substring(0, item1.TIME_START.length - 3)} - ${item1.TIME_END.substring(0, item1.TIME_END.length - 3)}</td>
            <td>${item1.movie.NAME_MOVIE}</td>
            <td>${item1.room.NAME_ROOM}</td>
            <td>${item1.PRICE_SHOWTIME}</td>
            <td><button class="btn btn-danger btnRemove" title="Xoá" value="${item1.ID_SHOWTIME}" name="btnEdit" ${new Date(item.DAY_SHOWTIME) < new Date() ? 'disabled' : ''}><i class="fas fa-trash"></i></button></td></td>
            <td><button class="btn btn-success btnEdit" title="Chỉnh sửa" value="${item1.ID_SHOWTIME}" name="btnEdit" ${new Date(item.DAY_SHOWTIME) < new Date() ? 'disabled' : ''} data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button></td>
        </tr>
        ${subRenderTable(itemShowtime, item.DAY_SHOWTIME)}
        `
    }).join('');
    return html;
}

async function getShowtimeById(value) {
    const editModal = document.querySelector('#editModal');
    await fetch(`${baseSite}api/getShowtimeById/${value}`)
        .then(response => response.json())
        .then(data => {
            editModal.querySelector('#movie').value = data.ID_MOVIE;
            editModal.querySelector('#room').value = data.ID_ROOM;
            editModal.querySelector('#date').value = data.DAY_SHOWTIME;
            editModal.querySelector('#price').value = data.PRICE_SHOWTIME;
            editModal.querySelector('#time_end').value = data.TIME_END;
            editModal.querySelector('#time_start').value = data.TIME_START;
        })
        .catch(error => {
            console.log(error);
        });
}

async function checkTime(value, formAdd) {
    checkFrom = false;
    formData = new FormData();
    formData.append('movie', formAdd.querySelector('#movie').value);
    formData.append('room', formAdd.querySelector('#room').value);
    formData.append('day_show', formAdd.querySelector('#date').value);
    formData.append('time_start', value);
    const isTime = await fetch(`${baseSite}api/isTimeShowtime`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: formData,
    }).then(res => res.json())
        .then(data => {
            return data;
        })
    formAdd.querySelector('#time_end').value = isTime.time_end;
    if (isTime.message == 'success') {
        formAdd.querySelector('#messageTime').textContent = '';
        checkFrom = true;
    } else {
        formAdd.querySelector('#messageTime').textContent = 'Bị trùng lịch!';
        checkFrom = false;
    }
}

async function createShowTime() {
    let validate = true;
    if (document.querySelector('#time_start').value == '') {
        validate = false;
        document.querySelector('#messageTime').textContent = 'Thiếu!';
    } else {
        document.querySelector('#messageTime').textContent = '';
    }

    if (document.querySelector('#price').value == '') {
        validate = false;
        document.querySelector('#messagePrice').textContent = 'Thiếu!';
    } else if (isNaN(document.querySelector('#price').value)) {
        validate = false;
        document.querySelector('#messagePrice').textContent = 'Phải là số';
    } else {
        document.querySelector('#messagePrice').textContent = '';
    }
    if (validate == true && checkFrom == true) {
        formData = new FormData();
        formData.append('ID_MOVIE', document.querySelector('#movie').value);
        formData.append('ID_ROOM', document.querySelector('#room').value);
        formData.append('DAY_SHOWTIME', document.querySelector('#date').value);
        formData.append('TIME_START', document.querySelector('#time_start').value);
        formData.append('TIME_END', document.querySelector('#time_end').value);
        formData.append('PRICE_SHOWTIME', document.querySelector('#price').value);
        await fetch(`${baseSite}api/createShowtime`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData,
        }).then(res => res.json())
            .then(data => {
                if (data.message = 'success') {
                    // reset form
                    document.querySelector('#time_start').value = '';
                    document.querySelector('#time_end').value = '';
                    Toast.fire({
                        icon: 'success',
                        title: 'Thêm lịch chiếu thành công!'
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Thêm lịch chiếu thất bại!'
                    })
                }
                getAllShowTime(numberDay);
            })
    }

}

async function editShowtime(element, idUpdate) {
    let validate = true;
    if (element.querySelector('#time_start').value == '') {
        validate = false;
        element.querySelector('#messageTime').textContent = 'Thiếu!';
    } else {
        element.querySelector('#messageTime').textContent = '';
    }

    if (element.querySelector('#price').value == '') {
        validate = false;
        element.querySelector('#messagePrice').textContent = 'Thiếu!';
    } else if (isNaN(element.querySelector('#price').value)) {
        validate = false;
        element.querySelector('#messagePrice').textContent = 'Phải là số';
    } else {
        element.querySelector('#messagePrice').textContent = '';
    }
    if (validate == true) {
        formData = new FormData();
        formData.append('_method', 'PUT');
        formData.append('ID_MOVIE', element.querySelector('#movie').value);
        formData.append('ID_ROOM', element.querySelector('#room').value);
        formData.append('DAY_SHOWTIME', element.querySelector('#date').value);
        formData.append('TIME_START', element.querySelector('#time_start').value);
        formData.append('TIME_END', element.querySelector('#time_end').value);
        formData.append('PRICE_SHOWTIME', element.querySelector('#price').value);
        await fetch(`${baseSite}api/updateShowtime/${idUpdate}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData,
        })
            .then(res => res.json())
            .then(data => {
                if (data.message = 'success') {
                    // reset form
                    Toast.fire({
                        icon: 'success',
                        title: 'Chỉnh sửa lịch chiếu thành công!'
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Chỉnh sửa lịch chiếu thất bại!'
                    })
                }
                getAllShowTime(numberDay);
            })
    }
}

async function removeShowtime(value) {
    if(confirm('Bạn có muốn xoá lịch chiếu này?')) {
        fetch(`${baseSite}api/removeShowtime/${value}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message = 'success') {
                // reset form
                Toast.fire({
                    icon: 'success',
                    title: 'Xoá lịch chiếu thành công!'
                })
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Xoá sửa lịch chiếu thất bại!'
                })
            }
            getAllShowTime(numberDay);
        })
        .catch(error => {
            console.log(error);
        });
    }
}

async function getAllShowTime(number) {
    document.querySelector('#btnNextDay').disabled = true;
    document.querySelector('#btnPrevDay').disabled = true;
    document.querySelector('#btnReload').disabled = true;
    desTroyDataTables('#tableShowTime');
    loading('#data-showTime');
    const showTime = await fetch(`${baseSite}api/getAllShowTime/${number}`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });
    document.querySelector('#btnNextDay').disabled = false;
    document.querySelector('#btnPrevDay').disabled = false;
    document.querySelector('#btnReload').disabled = false;
    htmlShowtime = renderTables(showTime);
    document.querySelector('#data-showTime').innerHTML = htmlShowtime;
    reload();
}

function convertDateToView(dateString) {
    let array = dateString.split('/');
    let newDate = new Date(array[2], array[1], array[0]);
    return newDate;
}

function renderDate(match) {
    let prevDay = new Date(convertDateToView(document.querySelector('.span-prevDay').textContent));
    let nextDay = new Date(convertDateToView(document.querySelector('.span-nextDay').textContent));
    if (match == '+') {

        prevDay.setDate(prevDay.getDate() + 7);
        nextDay.setDate(nextDay.getDate() + 7);

    } else {
        prevDay.setDate(prevDay.getDate() - 7);
        nextDay.setDate(nextDay.getDate() - 7);
    }
    document.querySelector('.span-prevDay').textContent = `${(prevDay).getDate() + "/" + (prevDay).getMonth() + "/" + (prevDay).getFullYear()}`
    document.querySelector('.span-nextDay').textContent = `${(nextDay).getDate() + "/" + (nextDay).getMonth() + "/" + (nextDay).getFullYear()}`
}


function addEventBtn() {
    const btnEdits = document.querySelectorAll('.btnEdit')
    const btnRemove = document.querySelectorAll('.btnRemove')
    for (let i = 0; i < btnEdits.length; i++) {
        btnEdits[i].addEventListener('click', () => {
            getShowtimeById(btnEdits[i].value);
            editModal.querySelector('#btnSubmitEdit').addEventListener('click', () => {
                editShowtime(editModal, btnEdits[i].value);
            })

        })
    }
    for (let i = 0; i < btnRemove.length; i++) {
        btnRemove[i].addEventListener('click', () => {
            removeShowtime(btnRemove[i].value);
        })
    }

}

document.querySelector('#btnReload').addEventListener('click', () => {
    getAllShowTime(0);
    defaultDay();
})
document.querySelector('#btnPrevDay').addEventListener('click', () => {
    getAllShowTime(numberDay - 1);
    numberDay--;
    renderDate('-');
})
document.querySelector('#btnNextDay').addEventListener('click', () => {
    getAllShowTime(numberDay + 1);
    numberDay++;
    renderDate('+');
})
const formAdd = document.querySelector('#formAdd');
formAdd.querySelector('#time_start').addEventListener('change', (e) => {
    checkTime(e.target.value, formAdd);
})

document.querySelector('#btnAddShow').addEventListener('click', () => {
    createShowTime();
})



// editModal.querySelector('#time_start').addEventListener('change', (e) => {
//     checkTime(e.target.value, editModal);
// })



// default
defaultDay();
getAllShowTime(0);
