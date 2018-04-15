<!Doctype html>
<html>
    <head>
        <title>Job Vacancy</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <script src="{{ url('/js/jquery.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/js/jquery-validation/dist/additional-methods.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
        <script type="text/javascript">
            
            $('#myModal').modal('hide');
            $('#myModal').modal({backdrop: 'static', keyboard: false});

         
    
            $(function() {
                
                   //Its for refreshing the page when user press back button
                    window.addEventListener( "pageshow", function ( event ) {
                        var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
                        var locationAddress = location.pathname;
                        if ( historyTraversal  && (locationAddress == "/")) {
                            // Handle page restore.
                            window.location.reload();
                        }
                    });
                
                //To store the hidden value when the modal shows
                $('#myModal').on("show.bs.modal", function (e) {
                    console.log($(e.relatedTarget).data('id'));
                    $("#myModal").find("#job_id").val($(e.relatedTarget).data('id'));
                    $("#myModal").find("#job_id_register").val($(e.relatedTarget).data('id'));                    
                });

                //Its for filling the select box value based on another select box
                $("#degree").change(function () {
                    var degree_id = $("#degree").val();
                    if (degree_id !== '' && degree_id !== null) {
                    $("#department").prop('disabled',
                    false).find('option[value]').remove();
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('degree') }}", // do not forget to register your route
                        data: {id: degree_id },
                        }).done(function (data) {
                        $.each(data, function (key, value) {
                            $("#department")
                                .append($("<option></option>")
                                .attr("value", key)
                                .text(value));
                        });
                    }).fail(function(jqXHR, textStatus){
                        console.log(jqXHR);
                    });
                    } else {
                        $("#department").prop('disabled', 
                        true).find("option[value]").remove();
                    }
                });
               //If the registration page shows error then open the modal and navigate to registeration form
                @if(count($errors->register) > 0)
                    $('#myModal').modal('show');
                    $('#registerTab').click();
                @endif
                
                //If the login page shows error then open the modal and navigate to login form
                @if(count($errors->login) > 0)
                    $('#myModal').modal('show');
                    $('#loginTab').click();
                @endif
            });

            
        </script>
    </head>
    <body>