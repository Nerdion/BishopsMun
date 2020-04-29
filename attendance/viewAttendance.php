<?php

include_once 'Attendance.php';


session_start();
if(!isset($_SESSION['adminLogin'])) {
    header("location: adminLogin.php");
}

if(isset($_GET['logout'])) {
    unset($_SESSION['adminLogin']);
    header("location: adminLogin.php");
}

?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Bishop MUN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        <link rel="shortcut icon" type="image/ico" href="others/favicon.ico">
        <link rel="stylesheet" href="nice-select.css">
    </head>
    <body>
        <h1 style="background-image: url('others/userback.jpg'); padding:1.5em; color:white">The Bishop's Model United Nation</h1>
        
        <div class="container">
            <div class="row">
                <div class="col">        			
                </div>
                
                <div class="col-3" align="right" >        		
                    <form action="viewAttendance.php" method="get">
                        <br>
                        <input class="btn btn-warning btn-md" type="submit" name="logout" value="Logout"/>
                    </form>
                </div>
                
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row" align="center">
                <div class="col">
                    <div class="radio">
                        <label><input type="radio" name="optradio" checked value="1">Attended</label>
                    </div>
                </div>
                <div class="col">
                    <div class="radio">
                        <label><input type="radio" name="optradio" value="2" >Not Attended</label>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row" align="center">
            
                <div class="col">
                    <h3>Events- </h3>
                </div>
                <div class="col">
                    <select id="dropdown" >
                        <option selected value=''></option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn" type="button" id="seeData">View</button>
                </div>
                <div class="col downloadButton">
                </div>
                
                <div class="col">
                    <h3>Committee-</h3>
                </div>
                <div class="col">
                    <select id="committeeList">
                        <option selected value=''></option>
                    </select>
                <div>
                
            </div>
            <div class="row">
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                
            </div>
        </div>
        <br>
        <br>
        <div class="container myData" align="center">
        </div>

        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script src="jquery.nice-select.js" type="text/javascript"></script>
        <script type="text/javascript">
            const objectToCSV = function(data) {
                const csvRows = [];
                //get the headers
                const headers = Object.keys(data[0]);

                csvRows.push(headers.join(','));

                for(const row of data) {
                    const values = headers.map(header => {
                        const escaped = (''+row[header]).replace(/"/g, '\\"');
                        return `"${row[header]}"`;
                    });
                    csvRows.push(values.join(','));
                }

                return csvRows.join('\n');
            }

            const download = function(data) {
                const blob = new Blob([data], {type: 'text/csv'});
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.setAttribute('hidden','');
                a.setAttribute('href',url);
                a.setAttribute('download','download.csv');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }



            $(function() {
                $('#seeData').click(function () {
                    var myEvent = $('#dropdown').val();
                    var committee = $('#committeeList').val();
                    var downloadButton = $('.downloadButton');

                    let option = $('input[name="optradio"]:checked').val();

                    $.post("controller.php",{getAttendance : option, eventID : myEvent, committeeName : committee }, function(data) {
                        data = JSON.parse(data);

                        $container = $('.myData');
                        $container.empty();
                        downloadButton.empty();
                        //$container.append('<div class="row border"> <div class="col"> SrNo </div> <div class="col"> Full Name </div> <div class="col"> Committee </div> <div class="col">Country</div> <div class="col">Event</div><div class="col"> Confiscated</div></div>');

                        if(option == 1) {
                            for(var i=0; i<data.length; i++) {
                                
                                if(data[i].confiscated) {
                                    $container.append('<div class="row border"> <div class="col">'+(i+1)+'</div><div class="col">'+ data[i].fullName+'</div> <div class="col">'+data[i].name+' </div> <div class="col">' +data[i].country +' </div> <div class="col">'+data[i].eventName+'</div> <div class="col">'+ data[i].confiscated +'</div> <div class="col">'+ data[i].timestamp +'</div> </div>');
                                } else {
                                    $container.append('<div class="row border"> <div class="col">'+(i+1)+'</div><div class="col">'+ data[i].fullName+'</div> <div class="col">'+data[i].name+' </div> <div class="col">' +data[i].country +' </div> <div class="col">'+data[i].eventName+'</div><div class="col">'+ data[i].timestamp +'</div></div>');
                                }
                            }
                            downloadButton.click(function () {
                                let csvData = objectToCSV(data);
                                download(csvData);
                                console.log(csvData);
                            });
                        } else if(option == 2) {
                            for(var i=0; i<data.length; i++) {
                                $container.append('<div class="row"> <div class="col">'+(i+1)+'</div> <div class="col">'+data[i].id+'</div><div class="col">'+data[i].fullName+'</div></div>');
                            }

                            downloadButton.click(function () {
                                let csvData = objectToCSV(data);
                                download(csvData);
                                console.log(csvData);
                            });
                        }

                        downloadButton.append('<button type="button" class="btn">Download CSV</button>');
                        delete data;
                    });

                    
                });
            });

        </script>
    </body>
</html>