
$(function () {
    var myInput = $("input#barcodeInput");
    var myDropdown = $("#dropdown");
    var securityInput = $("#securityConfiscate");

    $('select').niceSelect();


    
    //see id of confiscated items
    function getIDConfiscated(myInput) {
        $.post("controller.php", {seeConfiscated : 1, userID : myInput}, function(result) {
            result = JSON.parse(result);
            $('.confiscatedID').append('<h4>'+ result.id +'</h4>');
            console.log(result);
        });

    }

    //displaying user info
    function displayInfo(myInput) {
        $.post("controller.php", {details: 1, insertionID: myInput}, function(data) {
            data = JSON.parse(data);
            $('#userDetails').text(data['fullName'] + '   ' + data['name'] + '    ' + data['country']);
            console.log(data);
            if(myDropdown.val() == 1) {
                getIDConfiscated(myInput);
            }
        });
    }

    //inserting attendance
    function insertData(myInput, theEvent) {
        
        $.post("controller.php", {insertNewAttendance: 1, userID: myInput, eventID: theEvent}, function(result){
            if(result == -1) {
                //inserting a alert that person has already attended
                $("#alreadyAttended").append('<h1 style="color:red">Student has already attended!!</h1>');
                setTimeout(function(){
                    $('#alreadyAttended').empty();
                }, 3000);

            } else {
                displayInfo(myInput);
            }
        });
    }

    //insert confiscated items
    function insertConfiscated(myInput, confiscated, theEvent) {
        $.post("controller.php", {confiscatedUserID : myInput, confiscatedItems : confiscated}, function(e) {
            console.log(e);
        });
    }

    
    //when security option is selected
    myDropdown.change(function() {
        if(myDropdown.val() == 1) {
            securityInput.append('<input type="text" placeholder="Have you confiscated anything?"/>');
        } else {
            securityInput.empty();
        }
    });


    //on pressing enter
    myInput.keypress(function (e) {
        if(e.which == 13) {
            $('.confiscatedID').empty();
            var dropDownValue = myDropdown.val();
            // if event is of security check
            if(dropDownValue == 1) {
                confiscated = $('#securityConfiscate input');
                if(confiscated.val()) {
                    insertConfiscated(myInput.val(), confiscated.val());
                    confiscated.val('');
                }
            }
            insertData(myInput.val(), dropDownValue);
            $('#barcodeInput').val('');
        }
    });

    $.post("controller.php",{getEvents : 1}, function(data) {
        data = JSON.parse(data);
        //events
        for(var i=0; i<data.length; i++) {
            var option = $('<option />');
            option.attr({value : data[i].id}).text(data[i].eventName);
            myDropdown.append(option);
        }
        $('select').niceSelect('update');

    });

    $.post("controller.php",{committeeList : 1}, function(data) {
        data = JSON.parse(data);
        
        for(var i=0; i<data.length; i++) {
            var option = $('<option />');
            option.attr({value : data[i].id}).text(data[i].name);
            $('#committeeList').append(option);
        }
        $('select').niceSelect('update');
    });
    $('select').niceSelect('update');
});
