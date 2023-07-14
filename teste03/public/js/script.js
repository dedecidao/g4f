

const currentUrl = window.location.href;

function convertDate(string) {
    const [hora, minuto, segundo] = horaString.split(':');
    const data = new Date();
    data.setHours(Number(hora));
    data.setMinutes(Number(minuto));
    data.setSeconds(Number(segundo));
    return data;
}

function diaDaSemana(dia){
    switch(dia){
        case '0':
            return 'Domingo';
            break;
        case '1':
            return 'Segunda-feira';
            break;
        case '2':
            return 'Terça-feira';
            break;
        case '3':
            return 'Quarta-feira';
            break;
        case '4':
            return 'Quinta-feira';
            break;
        case '5':
            return 'Sexta-feira';
            break;
        case '6':
            return 'Sábado';
            break;
    }
}
function buscaSeriesAmanha(series){
    let diaDaSemana = new Date().getDay() + 1;
    diaDaSemana =(diaDaSemana >= 7) ? 0 : diaDaSemana;
    seriesDoDia = series.filter(function(serie){
        return serie.dia_da_semana == diaDaSemana;
    }
    );
    seriesDoDia.sort(function(a, b){
        return convertDate(a.horario) - convertDate(b.horario);
    });
    if(seriesDoDia.length == 0){
        return buscaSeriesAmanha(series);
    }
    return seriesDoDia;
}

function filtraProxSerie(series){

    let diaDaSemana = new Date().getDay();

    let hora = new Date().toLocaleTimeString('pt-BR', { hour12: false, hour: "numeric", minute: "numeric", second: "numeric" });

    let seriesDoDia = series.filter(function(serie){
        return serie.dia_da_semana == diaDaSemana;
    }
    );

    // orderna series do dia por horario
    seriesDoDia.sort(function(a, b){
        return convertDate(a.horario) - convertDate(b.horario);
    });
    //verifica se tem alguma serie depois da hora atual
    let filtraProxSeries = seriesDoDia.filter(function(seriesDoDia){
        return seriesDoDia.horario > hora;
    }
    );
    if(filtraProxSeries.length == 0){
        return buscaSeriesAmanha(series);
    }
    console.log(filtraProxSeries);
    return filtraProxSeries;

}

let firstRequest = currentUrl + 'series';

fetch(firstRequest)
  .then(function (response) {
    response.json().then(function (data) {
        let series = data;
        let proximaSerie = filtraProxSerie(series)
        console.log(proximaSerie);
            let elNome = document.getElementById('proxprograma');
            let elHorario = document.getElementById('proxhorario');
            let elGenero = document.getElementById('proxgenero');
            let elDia = document.getElementById('proxdia');
            elNome.innerHTML = proximaSerie[0].titulo;
            elHorario.innerHTML = proximaSerie[0].horario;
            elGenero.innerHTML = proximaSerie[0].genero;
            elDia.innerHTML = diaDaSemana(proximaSerie[0].dia_da_semana);


    });
  })
  .catch(function (error) {
    console.log(error);
  });


  //POST FORM

    const form = document.getElementById('formBuscaHorarioSerie');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let formData = new FormData(form);


       // Exibe os dados do formulário no console
       for (const [name, value] of formData.entries()) {
        console.log(`${name}: ${value}`);
      }
      fetch(currentUrl + 'series', {
        method: 'POST',
        body: formData
        })
        .then(function (response) {
            // console.log(response.json());
            response.json().then(function (data) {
                console.log(data.dados[0]);
                let elNomeResult = document.getElementById('result-nome');
                let elHorarioResult = document.getElementById('result-genero');
                let elGeneroResult = document.getElementById('result-canal');
                let elDiaResult = document.getElementById('result-horario');
                elNomeResult.innerHTML = data.dados[0].titulo;
                elHorarioResult.innerHTML = data.dados[0].genero;
                elGeneroResult.innerHTML = data.dados[0].canal;
                elDiaResult.innerHTML = data.dados[0].horario;

                
            });

        })
        .catch(function (error) {
            console.log(error);
        }
        );


    } );