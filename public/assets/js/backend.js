/**
 * Created by william on 1/25/2017.
 * Created by william on 1/25/2017.
 */


function report_search_by_date(module) {
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();

    if(from_date == "" && to_date == ""){
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else if(from_date == "" && to_date != "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else if(from_date != "" && to_date == "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else{
        var dateComparison = check_date(from_date, to_date);

        if(dateComparison){
            var form_action = "/"+module+"/search/"+ from_date + "/" + to_date;
        }
        else{
            sweetAlert("Oops...", "Please Choose the valid date !");
            return;
        }
    }
    window.location = form_action;
}

function report_export(module) {
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();

    if(from_date == "" && to_date == ""){
        var form_action = "/"+module+"/exportexcel";
    }
    else if(from_date == "" && to_date != "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else if(from_date != "" && to_date == "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else{
        var dateComparison = check_date(from_date, to_date);

        if(dateComparison){
            var form_action = "/"+module+"/exportexcel/"+ from_date + "/" + to_date;
        }
        else{
            sweetAlert("Oops...", "Please Choose the valid date !");
            return;
        }
    }
    window.location = form_action;
}

function report_pdf_export(module) {
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();

    if(from_date == "" && to_date == ""){
        var form_action = "/"+module+"/export";
    }
    else if(from_date == "" && to_date != "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else if(from_date != "" && to_date == "") {
        sweetAlert("Oops...", "Please Choose the date !");
        return;
    }
    else{
        var dateComparison = check_date(from_date, to_date);

        if(dateComparison){
            var form_action = "/"+module+"/export/"+ from_date + "/" + to_date;
        }
        else{
            sweetAlert("Oops...", "Please Choose the valid date !");
            return;
        }
    }
    window.location = form_action;
}

function check_date(from_date, to_date){

    var dateFirst = from_date.split('-');
    var dateSecond = to_date.split('-');
    var dateFistTemp = new Date(dateFirst[2], dateFirst[1], dateFirst[0]); //Year, Month, Date
    var dateSecondTemp = new Date(dateSecond[2], dateSecond[1], dateSecond[0]);

    if(dateSecondTemp < dateFistTemp){
        return false;
    }
    else{
        return true;
    }
}

function check_month(from_month, to_month){
    var dateFirst = from_month.split('-');
    var dateSecond = to_month.split('-');
    var dateFistTemp = new Date(dateFirst[1], dateFirst[0]); //Year, Month
    var dateSecondTemp = new Date(dateSecond[1], dateSecond[0]);

    if(dateSecondTemp < dateFistTemp){
        return false;
    }
    else{
        return true;
    }
}

function check_year(from_year, to_year){

    var dateFirst = from_year.split('-');
    var dateSecond = to_year.split('-');
    var dateFistTemp = new Date(dateFirst[0]); //Year
    var dateSecondTemp = new Date(dateSecond[0]);

    if(dateSecondTemp < dateFistTemp){
        return false;
    }
    else{
        return true;
    }
}

