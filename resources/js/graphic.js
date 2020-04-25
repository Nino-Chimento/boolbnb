$(document).ready(function(){
    var id = $(".hidden").text();
    
    
    $.ajax({
        url: "http://127.0.0.1:8000/api/graphic",
        method: 'get',
        data: {
            id : id,
        },
        success: function(data){
            date=[];
            view=[];
            for (var key in data) {
              date.push(key);
              view.push(data[key]);
             
              
            }
            var ctx = $('#myChart');
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels:date,
                    datasets: [{
                        label: '# of Votes',
                        data: view,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                // options: {
                //     scales: {
                //         yAxes: [{
                //             ticks: {
                //                 beginAtZero: false
                //             }
                //         }]
                //     }
                // }
            });
        },
        error: function(errore){
            console.log(errore);
            
        }
    });    
  
})