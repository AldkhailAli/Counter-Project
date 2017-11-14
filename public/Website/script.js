$(document).ready(function () {

//variables
//div
  var login = $('#login'),
      main = $('#main'),
      sidebar = $('#sidebar'),
      container = $('#container'),
      reportForm = $('#report-form'),
      reportResult = $('#report-result'),
      ticketDispenser = $('#ticket-dispenser'),
      dispenserSvc = $('#dispensersvcbtn'),
      confirmPaper = $('#confirm-papertix'),
      displayScr = $('#display-screen'),
      queueTable = $('#queue-table');
//button
  var loginbtn = $('#loginbtn'),
      trigger = $('#sidebar-toggle'),
      queue = $('#queue'),
      report = $('#report'),
      dispenser = $('#dispenser'),
      display = $('#display'),
      createR = $('#createRbtn'),
      yes = $('#yesbtn'),
      no = $('#nobtn'),
      logout = $('#logoutbtn');
//other
  var isClosed = true;


// function
     function open_sidebar() {
       main.css("margin-left", "25%");
       sidebar.css("width", "25%");
       sidebar.css("display", "block");
     }

     function close_sidebar() {
       main.css("margin-left", "0%");
       sidebar.css("display", "none");
     }

     function open_login() {
       login.show();//login.css("display", "block");
     }

     function hide_all() {
       reportForm.hide();
       reportResult.hide();
       queueTable.hide();
       ticketDispenser.hide();
       displayScr.hide();
     }

     function init(){
       hide_all();
       //open_login();
     }

//initiation
    init();

//on click
    display.click(function(){
      hide_all();
      displayScr.show();
    });

    yes.click(function(){
      confirmPaper.hide();
    });

    no.click(function(){
      confirmPaper.hide();
    });

    dispenserSvc.click(function(){
      confirmPaper.show();
    });

    dispenser.click(function(){
      hide_all();
      ticketDispenser.show();
    });

    loginbtn.click(function(){
      login.hide();
    });

    report.click(function(){
      hide_all();
      reportForm.show();
    });

    queue.click(function(){
      hide_all();
      queueTable.show();
    });

    createR.click(function(e){
      e.preventDefault();
      hide_all();
      reportResult.show();
    });

    logout.click(function(){
      init();
    });

    trigger.click(function () {

      if (isClosed == true) {
        open_sidebar();
        isClosed = false;
      } else {
        close_sidebar();
        isClosed = true;
      }
    });




});
