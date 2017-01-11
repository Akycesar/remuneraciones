<script type="text/javascript">
            $(document).ready(function() {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                var cId = $('#calendar'); //Change the name if you want. I'm also using thsi add button for more actions

                //Generate the Calendar
                cId.fullCalendar({
                    header: {
                        right: '',
                        center: 'prev, title, next',
                        left: ''
                    },

                    theme: true, //Do not remove this as it ruin the design
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    //Add Events
                    events: [
                        {
                            title: 'Cumpleaño Cesar',
                            start: new Date(y, m, 7),
                            allDay: true,
                            className: 'bg-cyan'
                        },
                        {
                            title: 'Reunion Agencia',
                            start: new Date(y, m, 10),
                            allDay: true,
                            className: 'bg-orange'
                        },
                    ],
                     
                    //On Day Select
                    select: function(start, end, allDay) {
                        $('#addNew-event').modal('show');   
                        $('#addNew-event input:text').val('');
                        $('#getStart').val(start);
                        $('#getEnd').val(end);
                    }
                });

                //Create and ddd Action button with dropdown in Calendar header. 
                var actionMenu = '<ul class="actions actions-alt" id="fc-actions">' +
                                    '<li class="dropdown">' +
                                        '<a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>' +
                                        '<ul class="dropdown-menu">' +
                                            '<li class="active">' +
                                                '<a data-view="month" href="">Ver Mes</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicWeek" href="">Ver Semana</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaWeek" href="">Agenda Semana</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="basicDay" href="">Ver Dia</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a data-view="agendaDay" href="">Agenda Día</a>' +
                                            '</li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</li>';


                cId.find('.fc-toolbar').append(actionMenu);
                
                //Event Tag Selector
                (function(){
                    $('body').on('click', '.event-tag > span', function(){
                        $('.event-tag > span').removeClass('selected');
                        $(this).addClass('selected');
                    });
                })();
            
                //Add new Event
                $('body').on('click', '#addEvent', function(){
                    var eventName = $('#eventName').val();
                    var tagColor = $('.event-tag > span.selected').attr('data-tag');
                        
                    if (eventName != '') {
                        //Render Event
                        $('#calendar').fullCalendar('renderEvent',{
                            title: eventName,
                            start: $('#getStart').val(),
                            end:  $('#getEnd').val(),
                            allDay: true,
                            className: tagColor
                            
                        },true ); //Stick the event
                        
                        $('#addNew-event form')[0].reset()
                        $('#addNew-event').modal('hide');
                    }
                    
                    else {
                        $('#eventName').closest('.form-group').addClass('has-error');
                    }
                });   

                //Calendar views
                $('body').on('click', '#fc-actions [data-view]', function(e){
                    e.preventDefault();
                    var dataView = $(this).attr('data-view');
                    
                    $('#fc-actions li').removeClass('active');
                    $(this).parent().addClass('active');
                    cId.fullCalendar('changeView', dataView);  
                });
            });                        
        </script>
<section id="content">
            <div class="container c-boxed">
                <header class="page-header">
                   
                </header>
                
                <div id="calendar"></div>
                    
                <!-- Add event -->
                <div class="modal fade" id="addNew-event" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Evento</h4>
                            </div>
                            <div class="modal-body">
                                <form class="addEvent" role="form">
                                    <div class="form-group">
                                        <label for="eventName">Nombre Evento</label>
                                        <div class="fg-line">
                                            <input type="text" class="input-sm form-control" id="eventName" placeholder="ej: Reunión directivos">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="eventName">Color</label>
                                        <div class="event-tag">
                                            <span data-tag="bg-teal" class="bg-teal selected"></span>
                                            <span data-tag="bg-red" class="bg-red"></span>
                                            <span data-tag="bg-pink" class="bg-pink"></span>
                                            <span data-tag="bg-blue" class="bg-blue"></span>
                                            <span data-tag="bg-lime" class="bg-lime"></span>
                                            <span data-tag="bg-green" class="bg-green"></span>
                                            <span data-tag="bg-cyan" class="bg-cyan"></span>
                                            <span data-tag="bg-orange" class="bg-orange"></span>
                                            <span data-tag="bg-purple" class="bg-purple"></span>
                                            <span data-tag="bg-gray" class="bg-gray"></span>
                                            <span data-tag="bg-black" class="bg-black"></span>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" id="getStart" />
                                    <input type="hidden" id="getEnd" /> 
                                </form>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm" id="addEvent">Agregar</button>
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>