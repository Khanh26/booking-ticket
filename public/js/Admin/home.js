const dataPrice = {
    data: [],
    getData: async function () {
        await fetch('http://127.0.0.1:8000/api/reportMoviePrice')
            .then(res => res.json())
            .then(data => {
                data.map((item) => {
                    this.data.push({
                        'NAME_MOVIE': item.NAME_MOVIE,
                        'total': item.total,
                    })
                })
            })
    },
    getLabel: function () {
        return this.data.map((item) => {
            return item.NAME_MOVIE;
        })
    },
    getValue: function () {
        return this.data.map((item) => {
            return item.total;
        })
    }
}

const dataTicket = {
    data: [],
    getData: async function () {
        await fetch('http://127.0.0.1:8000/api/reportMovieTicket')
            .then(res => res.json())
            .then(data => {
                data.map((item) => {
                    this.data.push({
                        'NAME_MOVIE': item.NAME_MOVIE,
                        'total': item.total,
                    })
                })
            })
    },
    getLabel: function () {
        return this.data.map((item) => {
            return item.NAME_MOVIE;
        })
    },
    getValue: function () {
        return this.data.map((item) => {
            return item.total;
        })
    }
}




async function charAdmin() {
    
    await dataPrice.getData();
    await dataTicket.getData();
    const ctxTicket = document.getElementById('charTicket');
    const charTicket = new Chart(ctxTicket, {
        type: 'bar',
        data: {
            labels: dataPrice.getLabel(),
            datasets: [{
                label: 'Số vé bán ra theo phim đang chiếu',
                data: dataPrice.getValue(),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxTotal = document.getElementById('charTotal');

    const charTotal = new Chart(ctxTotal, {
        type: 'bar',
        data: {
            labels: dataTicket.getLabel(),
            datasets: [{
                label: 'Doanh thu theo phim đang chiếu',
                data: dataTicket.getValue(),
                backgroundColor: [
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
charAdmin();