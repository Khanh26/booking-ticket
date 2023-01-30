function renderTables(Movies) {
    console.log(Movies);
    let html = Movies.map((movie) => {
        return `
        <tr>
            <td><input type="checkbox" class="checkOne" name="checkMovies" value="${movie.ID_MOVIE}"></td>
            <td><img src="${baseSite}img/poster/${movie.POSTER_MOVIE}" class="poster-table" /></td>
            <td>${movie.NAME_MOVIE}</td>
            <td>${new Date(movie.OPDAY_MOVIE).getDate() + "/" + (new Date(movie.OPDAY_MOVIE).getMonth() + 1) + "/" + new Date(movie.OPDAY_MOVIE).getFullYear()}</td>
            <td>${movie.STATUS_MOVIE == 1 ? 'Hiện' : 'Ẩn'}</td>
            <td>
                <button class="btn btn-primary btnView" title="Chi tiết" value="${movie.ID_MOVIE}" name="btnView" data-toggle="modal" data-target="#viewModal"><i class="far fa-eye"></i></button>
                <button class="btn btn-success btnEdit" title="Chỉnh sửa" value="${movie.ID_MOVIE}" name="btnEdit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
            </td>
            </tr>
        `
    }).join('');
    return html;
}

function checkBox() {
    const checkAll = document.querySelector("#checkAll");

    // Action Buttons
    const removeAllBtn = document.querySelector(".remove-all-btn");
    const checkOne = document.querySelectorAll(".checkOne");
    // check all
    checkAll.addEventListener('change', () => {
        if (checkAll.checked) {
            for (checkItem of checkOne) {
                checkItem.checked = true;
            }
            removeAllBtn.disabled = false;
        } else {
            for (checkItem of checkOne) {
                checkItem.checked = false;
            }
            removeAllBtn.disabled = true;
        }
    })


    // Enable btn remove
    for (var i = 0; i < checkOne.length; i++) {
        checkOne[i].addEventListener('click', (e) => {
            if (e.target.checked) {
                removeAllBtn.disabled = false;
            } else {
                var check = false
                for (checkItem of checkOne) {
                    if (checkItem.checked) {
                        check = true;
                    }
                }
                if (!check) {
                    removeAllBtn.disabled = true;
                }
            }
        })
    }
}

function ArrayToString(array) {
    let string = array.map(element => {
        return element.NAME_GENRE;
    }).join(', ');

    return string.charAt(0).toUpperCase() + string.slice(1);
}

function errorMessage(message, element) {
    element.textContent = message;
}

function getValueData(name, data) {
    return data.find(element => {
        return element.name == name;
    })
}

async function createMovie() {
    const addModal = document.querySelector('#addModal');
    const data = [
        {
            name: 'poster',
            input: addModal.querySelector('.formFilePoster'),
            value: addModal.querySelector('.formFilePoster').files,
        },

        {
            name: 'language',
            input: addModal.querySelector('.language'),
            value: addModal.querySelector('.language').value,
        },

        {
            name: 'trailer',
            input: addModal.querySelector('.trailer'),
            value: addModal.querySelector('.trailer').value,
        },

        {
            name: 'content',
            input: addModal.querySelector('.content'),
            value: addModal.querySelector('.content').value,
        },

        {
            name: 'nameMovie',
            input: addModal.querySelector('.nameMovie'),
            value: addModal.querySelector('.nameMovie').value,
        },

        {
            name: 'genres',
            input: addModal.querySelector('.check-genre'),
            value: covertDataToString(addModal.querySelectorAll('.genre')),
        },

        {
            name: 'time',
            input: addModal.querySelector('.time'),
            value: addModal.querySelector('.time').value,
        },

        {
            name: 'actor',
            input: addModal.querySelector('.actor'),
            value: addModal.querySelector('.actor').value,
        },

        {
            name: 'director',
            input: addModal.querySelector('.director'),
            value: addModal.querySelector('.director').value,
        },

        {
            name: 'dateShow',
            input: addModal.querySelector('.dateShow'),
            value: addModal.querySelector('.dateShow').value,
        },

        {
            name: 'suitable',
            input: addModal.querySelector('.suitable'),
            value: addModal.querySelector('.suitable').value,
        }
    ]
    // validate forms
    let validate = true;
    for (let key in data) {
        // console.log(data[key].value);
        if (data[key].value.length == 0) {
            validate = false;
            let message = data[key].input.parentElement.querySelector('.message');
            message.textContent = 'Không được để trống';
        }
    }
    if (validate == true) {
        formData = new FormData();
        formData.append('ID_SUITABLE', getValueData('suitable', data).value);
        formData.append('ID_LANGUAGE', getValueData('language', data).value);
        formData.append('NAME_MOVIE', getValueData('nameMovie', data).value);
        formData.append('POSTER_MOVIE', getValueData('poster', data).value[0]);
        formData.append('TIME_MOVIE', getValueData('time', data).value);
        formData.append('OPDAY_MOVIE', getValueData('dateShow', data).value);
        formData.append('DIRECTOR_MOVIE', getValueData('director', data).value);
        formData.append('ACTOR_MOVIE', getValueData('actor', data).value);
        formData.append('CONTENT_MOVIE', getValueData('content', data).value);
        formData.append('TRAILER_MOVIE', getValueData('trailer', data).value);
        formData.append('GENRES', getValueData('genres', data).value);
        await fetch(`${baseSite}api/createMovie`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData,
        })
            .then(res => res.json())
            .then(data => {
                if (data.result = 'success') {
                    // reset form
                    document.querySelector('#formAddMovie').reset();
                    addModal.querySelector('#prPosterAdd').src = `${baseSite}img/default.png`;
                    for (let element of document.querySelectorAll('.message')) {
                        element.textContent = '';
                    }
                    // reload data
                    getAllMovie();
                    // Alert
                    Toast.fire({
                        icon: 'success',
                        title: 'Thêm phim mới thành công!'
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Thêm phim mới thất bại!'
                    })
                }
            })
    }
}


async function editMovie(value) {
    const movie = await fetch(`${baseSite}api/getMovieById/?id=${value}`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });
    // render value....
    // check include ....
    const editModal = document.querySelector('#editModal');
    const posterImg = editModal.querySelector('#prPosterEdit');
    // const poster = editModal.querySelector('.formFilePoster');
    const language = editModal.querySelector('.language');
    const trailer = editModal.querySelector('.trailer');
    const content = editModal.querySelector('.content');
    const nameMovie = editModal.querySelector('.nameMovie');
    const suitable = editModal.querySelector('.suitable');
    const actor = editModal.querySelector('.actor');
    const director = editModal.querySelector('.director');
    const dateShow = editModal.querySelector('.dateShow');
    const time = editModal.querySelector('.time');
    const genre = editModal.querySelectorAll('.genre');
    const status = editModal.querySelector('.status');
    // reset checkbox
    for (let i = 0; i < genre.length; i++) {
        genre[i].checked = false;
    }
    // set value
    posterImg.src = `${baseSite}img/poster/${movie.POSTER_MOVIE}`;
    language.value = movie.language.ID_LANGUAGE;
    trailer.value = movie.TRAILER_MOVIE;
    content.value = movie.CONTENT_MOVIE;
    nameMovie.value = movie.NAME_MOVIE;
    suitable.value = movie.suitable.ID_SUITABLE;
    actor.value = movie.ACTOR_MOVIE;
    director.value = movie.DIRECTOR_MOVIE;
    dateShow.value = movie.OPDAY_MOVIE;
    time.value = movie.TIME_MOVIE;
    status.value = movie.STATUS_MOVIE;
    // set checkbox
    movie.genre.forEach(element => {
        for (let i = 0; i < genre.length; i++) {
            if (element.ID_GENRE == genre[i].value) {
                genre[i].checked = true;
            }
        }
    });

    editModal.querySelector('#btnSubmitEdit').onclick = () => {
        const data = [
            {
                name: 'poster',
                input: editModal.querySelector('.formFilePoster'),
                value: editModal.querySelector('.formFilePoster').files,
            },

            {
                name: 'language',
                input: editModal.querySelector('.language'),
                value: editModal.querySelector('.language').value,
            },

            {
                name: 'trailer',
                input: editModal.querySelector('.trailer'),
                value: editModal.querySelector('.trailer').value,
            },

            {
                name: 'content',
                input: editModal.querySelector('.content'),
                value: editModal.querySelector('.content').value,
            },

            {
                name: 'nameMovie',
                input: editModal.querySelector('.nameMovie'),
                value: editModal.querySelector('.nameMovie').value,
            },

            {
                name: 'genres',
                input: editModal.querySelector('.check-genre'),
                value: covertDataToString(editModal.querySelectorAll('.genre')),
            },

            {
                name: 'time',
                input: editModal.querySelector('.time'),
                value: editModal.querySelector('.time').value,
            },

            {
                name: 'actor',
                input: editModal.querySelector('.actor'),
                value: editModal.querySelector('.actor').value,
            },

            {
                name: 'director',
                input: editModal.querySelector('.director'),
                value: editModal.querySelector('.director').value,
            },

            {
                name: 'dateShow',
                input: editModal.querySelector('.dateShow'),
                value: editModal.querySelector('.dateShow').value,
            },

            {
                name: 'suitable',
                input: editModal.querySelector('.suitable'),
                value: editModal.querySelector('.suitable').value,
            },

            {
                name: 'status',
                input: editModal.querySelector('.status'),
                value: editModal.querySelector('.status').value,
            }
        ]

        let validate = true;
        for (let key in data) {
            // console.log(data[key].value);
            if (data[key].value.length == 0 && data[key].name != 'poster') {
                validate = false;
                let message = data[key].input.parentElement.querySelector('.message');
                message.textContent = 'Không được để trống';
            }
        }

        if (validate) {
            formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('ID_SUITABLE', getValueData('suitable', data).value);
            formData.append('ID_LANGUAGE', getValueData('language', data).value);
            formData.append('NAME_MOVIE', getValueData('nameMovie', data).value);
            formData.append('POSTER_MOVIE', getValueData('poster', data).value[0] == undefined ? '' : getValueData('poster', data).value[0]);
            formData.append('TIME_MOVIE', getValueData('time', data).value);
            formData.append('OPDAY_MOVIE', getValueData('dateShow', data).value);
            formData.append('DIRECTOR_MOVIE', getValueData('director', data).value);
            formData.append('ACTOR_MOVIE', getValueData('actor', data).value);
            formData.append('CONTENT_MOVIE', getValueData('content', data).value);
            formData.append('TRAILER_MOVIE', getValueData('trailer', data).value);
            formData.append('STATUS_MOVIE', getValueData('status', data).value);
            formData.append('GENRES', getValueData('genres', data).value);

            fetch(`${baseSite}api/updateMovie/${value}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData,
            })
                .then(res => res.json())
                .then(data => {
                    if (data.result = 'success') {
                        // reset form
                        for (let element of document.querySelectorAll('.message')) {
                            element.textContent = '';
                        }
                        // reload data
                        getAllMovie();
                        // Alert
                        Toast.fire({
                            icon: 'success',
                            title: 'Chỉnh sửa phim thành công!'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Chỉnh sửa phim thất bại!'
                        })
                    }
                })
        }
    }
}

async function viewMovie(value) {
    const viewModal = document.querySelector('#viewModal');
    loading('.viewModalBody');
    const movie = await fetch(`${baseSite}api/getMovieById/?id=${value}`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });

    htmlMovie = `
    <div class="row">
        <div class="col col-6">
            <div class="mb-3 position-relative text-center d-input">
                <img src="${baseSite}img/poster/${movie.POSTER_MOVIE}" width="100%" id="poster" class="d-block mb-2">
            </div>
        </div>
        <div class="col col-6">

            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Tên phim: </h6>
                <p class="body-details-film nameView d-inline">${movie.NAME_MOVIE}</p>
            </div>
            <div class="mb-3 position-relative d-input ">
                <h6 class="heading-details-film d-inline">Thế loại: </h6>
                <p class="body-details-film genresView d-inline">${ArrayToString(movie.genre)}</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Thời lượng: </h6>
                <p class="body-details-film timeView d-inline">${movie.TIME_MOVIE} phút</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Ngày công chiếu: </h6>
                <p class="body-details-film suitableView d-inline">${new Date(movie.OPDAY_MOVIE).getDate() + "/" + (new Date(movie.OPDAY_MOVIE).getMonth() + 1) + "/" + new Date(movie.OPDAY_MOVIE).getFullYear()}</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Đối tượng: </h6>
                <p class="body-details-film suitableView d-inline">${movie.suitable.NOTE_SUITABLE}</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Diễn viên: </h6>
                <p class="body-details-film actorView d-inline">${movie.ACTOR_MOVIE}</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Đạo diễn: </h6>
                <p class="body-details-film directorView d-inline">${movie.DIRECTOR_MOVIE}</p>
            </div>
            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Trailer: </h6>
                <p class="body-details-film trailerView d-inline">${movie.TRAILER_MOVIE}</p>
            </div>

            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Trạng thái: </h6>
                <p class="body-details-film trailerView text-capitalize d-inline">${movie.language.NAME_LANGUAGE}</p>
            </div>

            <div class="mb-3 position-relative d-input">
                <h6 class="heading-details-film d-inline">Trạng thái: </h6>
                <p class="body-details-film trailerView d-inline">${movie.STATUS_MOVIE == 1 ? 'Hiện' : "Ẩn"}</p>
            </div>
        </div>

        <div class="col col-12 mt-4">
            <h6 class="heading-details-film text-center">Nội dung</h6>
            <p class="body-details-film trailerView d-inline">${movie.CONTENT_MOVIE}</p>
        </div>
    </div>
    `
    viewModal.querySelector('.modal-body').innerHTML = htmlMovie;
}

function addEventBtn() {
    $('#example1').on('click', '.btnEdit', function () {
        editMovie(this.value);
    });

    $('#example1').on('mouseup', "input[type='checkbox']", function () {
        checkBox();
    });

    $('#example1').on('click', '.btnView', function () {
        viewMovie(this.value);
    });
}

async function searchMovie() {
    desTroyDataTables('#example1');
    loading('#data-movie');
    const search = document.querySelector('#inputSearch').value;
    const movies = await fetch(`${baseSite}api/getMovieByName/?search=${search}`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });
    htmlMovies = renderTables(movies);
    document.querySelector('#data-movie').innerHTML = htmlMovies;
    reload();
}

function covertDataToString(array) {
    let newArray = [];
    array.forEach((element) => {
        if (element.checked === true) {
            newArray.push(element.value);
        }
    });
    return newArray.join('-');
}

function covertDataToArray(array) {
    let newArray = [];
    array.forEach((element) => {
        if (element.checked === true) {
            newArray.push(element.value);
        }
    });
    return newArray
}

async function filterMovie() {
    desTroyDataTables('#example1');
    loading('#data-movie');
    const genres = covertDataToString(document.getElementsByName('genre_filter'));
    const suitable = covertDataToString(document.getElementsByName('suitable_filter'));
    const status = covertDataToString(document.getElementsByName('status_filter'));
    const language = covertDataToString(document.getElementsByName('language_filter'));
    const movies = await fetch(`${baseSite}api/filterMovie/?genres=${genres}&suitable=${suitable}&status=${status}&language=${language}`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });
    htmlMovies = renderTables(movies);
    document.querySelector('#data-movie').innerHTML = htmlMovies;
    reload();
}

async function removeMovie() {
    // Get checked
    const array = [];
    const checkbox = document.querySelectorAll('.checkOne');
    for (let i = 0; i < checkbox.length; i++) {
        if (checkbox[i].checked == true) {
            array.push(checkbox[i].value);
        }
    }
    const stringId = array.join('-');
    // show warning
    document.querySelector('.numberCheckbox').textContent = array.length;
    // submit warning
    document.querySelector('#btnSubmitRemove').addEventListener('click', () => {
        loading('.confirmModalBody');
        fetch(`${baseSite}api/deleteMovie/${stringId}`, {
            method: 'DELETE',
        })
            .then(response => response.json())
            .then(data => {
                if (data.result == 'success') {
                    document.querySelector('.confirmModalBody').innerHTML = ' Bạn có chắc xoá các phim đã chọn(<span class="numberCheckbox"></span>) ?';
                    $('#confirmModal').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Xoá phim thành công!'
                    })
                    getAllMovie();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Xoá phim thất bại!'
                    })
                }
            });

    })
}


async function getAllMovie() {
    document.querySelector('#btnReload').disabled = true;
    desTroyDataTables('#example1');
    loading('#data-movie');
    const movies = await fetch(`${baseSite}api/getAllMovie`)
        .then(response => response.json())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.log(error);
        });
    document.querySelector('#btnReload').disabled = false;
    htmlMovies = renderTables(movies);
    document.querySelector('#data-movie').innerHTML = htmlMovies;
    reload();
}

function readURL(input, element) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
            $(element)
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function reload() {
    dataTablesLoad('#example1', [
        {"width": "3%"},
        null,
        null,
        {"width": "17%"},
        {"width": "15%"},
        {"width": "15%"},
    ]);
    checkBox();
    addEventBtn();
}

// Add event.

// form event

// get filter
document.querySelector('.filter-form').onsubmit = (e) => {
    e.preventDefault();
    if ($('.filter-form').serialize() == '') {
        getAllMovie();
    } else {
        filterMovie();
    }
    e.target.parentElement.classList.remove('open');
    document.querySelector('.btnFilter').innerHTML = '<i class="fas fa-filter"></i> Bộ lọc';
}

document.querySelector('.btnFilter').addEventListener('click', function (e) {
    e.target.nextElementSibling.classList.toggle('open');
    if (e.target.nextElementSibling.classList == 'filter open') {
        e.target.style.backgroundColor = '#e9ecef';
        e.target.innerHTML = '<i class="fas fa-filter"></i> Đóng';
    } else {
        e.target.style.backgroundColor = '#f8f9fa';
        e.target.innerHTML = '<i class="fas fa-filter"></i> Bộ lọc'
    }

})

document.querySelector('#btnAddMovie').addEventListener('click', () => {
    createMovie();
});
document.querySelector('#btnReload').addEventListener('click', () => {
    getAllMovie();
});
document.querySelector('#btnRemove').addEventListener('click', () => {
    removeMovie()
});
document.querySelector('#btnSearch').addEventListener('click', () => {
    searchMovie()
});
document.querySelector('#inputSearch').addEventListener('keyup', (e) => {
    if (e.key == 'Enter') {
        searchMovie();
    }
});

getAllMovie();
