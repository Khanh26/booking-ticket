const baseSite = 'http://127.0.0.1:8000/';
function renderTicket(value) {
    const listTicket = document.querySelector('.list-ticket');
    const id_member = document.querySelector('#idMemberCheckOut').value;
    fetch(`http://127.0.0.1:8000/api/getAllTicket/?ID_MEMBER=${id_member}&filter=${value}`)
        .then(res => res.json())
        .then(data => {
            let html = data.map((item) => {
                return `
            <div class="col col-3 mb-3">
                <div class="card">
                    <div class="card-header ticket-title text-uppercase text-center">
                        <h6 class="ticket-title mb-0">Vé xem phim tại RAP1HK</h6>
                    </div>
                    <div class="card-body ticket-body">
                        <div class="row justify-content-between">
                            <div class="col-6">Phim:</div>
                            <div class="col-6">${item.NAME_MOVIE}</div>
                            <div class="col-6">Ngày chiếu:</div>
                            <div class="col-6">${item.DAY_SHOWTIME}</div>
                            <div class="col-6">Giờ chiếu</div>
                            <div class="col-6">${item.TIME_START.substring(0, item.TIME_START.length - 3)} - ${item.TIME_END.substring(0, item.TIME_END.length - 3)}</div>
                            <div class="col-6">Ghế: </div>
                            <div class="col-6">${item.LOCATION_TICKET}</div>
                            <div class="col-6">Ngày mua:</div>
                            <div class="col-6">${new Date(item.DAY_TICKET).getHours() + ':' + new Date(item.DAY_TICKET).getMinutes() + ' ' + new Date(item.DAY_TICKET).getDate() + "/" + (new Date(item.DAY_TICKET).getMonth() + 1) + "/" + new Date(item.DAY_TICKET).getFullYear()}</div>
                            <div class="col-6">Giá: </div>
                            <div class="col-6">${item.PRICE_SHOWTIME} VND</div>
                        </div>
                    </div>
                    <div class="card-footer ticket-footer text-center position-relative">
                        <button class="download-ticket" title="Tải vé về"><i class="fas fa-file-download"></i></button>
                        <h6 class="ticket-title mb-1">${item.ID_TICKET}</h6>
                        <p class="note-ticket mb-0">Vui lòng số này đến quầy để nhận vé của bạn</p>
                    </div>
                </div>
            </div>
            `
            }).join('');
            listTicket.innerHTML = html;
            document.querySelectorAll('.download-ticket').forEach((element) => {
                element.addEventListener('click', () => {
                    html2canvas(element.parentElement.parentElement).then(function (canvas) {
                        var anchorTag = document.createElement("a");
                        document.body.appendChild(anchorTag);
                        anchorTag.download = "filename.jpg";
                        anchorTag.href = canvas.toDataURL();
                        anchorTag.target = '_blank';
                        anchorTag.click();
                    });
                })
            })
        })
}
renderTicket(document.querySelector('#filter-ticket').value);

document.querySelector('#filter-ticket').addEventListener('change', () => {
    renderTicket(document.querySelector('#filter-ticket').value);
})


