$(function() {

  // sample calendar events data

  var curYear = moment().format('YYYY');
  var curMonth = moment().format('MM');



  // initialize the calendar
  $('#fullcalendar').fullCalendar({
    buttonText: {
      prev: "Ant",
      next: "Sig",
      today: "Hoy",
      month: "Mes",
      week: "Semana",
      day: "Día",
      list: "Agenda"
    },
    weekText: "Sm",
    allDayText: "Todo el día",
    moreLinkText: "más",
    noEventsText: "No hay eventos para mostrar",
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
    header: {
      left: 'prev,today,next',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listMonth'
    },
    editable: false,
    droppable: true, // this allows things to be dropped onto the calendar
    dragRevertDuration: 0,
    defaultView: 'month',
    eventLimit: true, // allow "more" link when too many events
    eventClick:  function(event, jsEvent, view) {
      alert(event.title + ' - ' + event.descripcion + ' - ' + event.alumno + ' - ' + event.especialidad);
    },
    dayClick: function(date, jsEvent, view) {
      $("#txtFecha").val(date.format());
      $("#modalAgregar").modal('show');
      $(this).css("background-color","red");
    },
    events:[
      {
        title:'Evento 1',
        descripcion: 'Es una desc',
        alumno: 'Benito Perez',
        especialidad: 'Retroexcavadora',
        start: '2020-08-20'
      },
      {
        title:'Evento 2',
        start: '2020-08-20'
      },
      {
        title:'Evento 3',
        start: '2020-08-20'
      },
      {
        title:'Evento 4',
        start: '2020-08-20'
      },
      {
        title:'Evento 5',
        start: '2020-08-20'
      },
      {
        title:'Evento 6',
        descripcion: 'Es una desc',
        alumno: 'Benito Perez',
        especialidad: 'Retroexcavadora',
        start: '2020-08-20T12:30:00',
        allDay: false
      },
      {
        title:'Examen Lurin - Retroexacavadora',
        descripcion: 'Es una desc',
        alumno: 'Benito Perez',
        especialidad: 'Retroexcavadora',
        start: '2020-08-20T12:30:00',
        allDay: false
      },
      {
        title:'Evento 7',
        start: '2020-08-20'
      }
    ]
  });

});