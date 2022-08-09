var nameRegex = /^[A-Za-z]+$/;
var emailRegex = /^[a-zA-Z0-9_.]+@[a-zA-Z]+\.com$/;
var specialCharRegex = /[@\.#!$&_^*~-]+/;
var upperRegex = /[A-Z]+/;
var numRegex = /[0-9]+/;
var lowerRegex = /[a-z]+/;
var emailFlag = false;
var passFlag = false;
var cnfrmFlag = false;
var numFlag = false;
var userFlag = false;
var DOBFlag = false;
var radioFlag = false;
var flag = false;

function dup(element,msg){
  $(`#${element}`).removeClass("is-valid");
  $(`#${element}`).addClass("is-invalid");
  $(`#${element} ~ .invalid-feedback`).html(msg+"already exists");
}

function checkPassword(element) {
  if (
    !upperRegex.test(element.value) ||
    !numRegex.test(element.value) ||
    !specialCharRegex.test(element.value) ||
    !lowerRegex.test(element.value) ||
    element.value.length < 8
  ) {
    $(element).removeClass("is-valid");
    $(element).addClass("is-invalid");
    if (!upperRegex.test(element.value)) {
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Password should contain atleast one uppercase character"
      );
    } else if (!lowerRegex.test(element.value)) {
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Password should contain atleast one lowercase character"
      );
    } else if (!specialCharRegex.test(element.value)) {
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Password should contain atleast one special character"
      );
    } else if (!numRegex.test(element.value)) {
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Password should contain atleast one digit"
      );
    } else if (element.value.length < 8) {
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Password should be minimum of 8 character"
      );
    }
    passFlag = false;
  } else {
    passFlag = true;
    $(element).removeClass("is-invalid");
    $(element).addClass("is-valid");
  }
}
function checkName(element) {
  if (nameRegex.test(element.value)) {
    if (element.value.length <= 6) {
      $(element).removeClass("is-valid");
      $(`#${element.id} ~ .invalid-feedback`).html(
        "Minimum 6 characters are required"
      );
      $(element).addClass("is-invalid");
    } else {
      $(element).removeClass("is-invalid");
      $(element).addClass("is-valid");
    }
  } else {
    $(element).removeClass("is-valid");
    $(element).addClass("is-invalid");
    $(`#${element.id} ~ .invalid-feedback`).html("Only Characters are allowed");
  }
}
function checkUsername(element) {
  if (element.value.length < 8) {
    userFlag = false;
    $(element).removeClass("is-valid");
    $(element).addClass("is-invalid");
  } else {
    userFlag = true;
    $(element).removeClass("is-invalid");
    $(element).addClass("is-valid");
  }
}

function checkEmail(element) {
  if (emailRegex.test(element.value)) {
    emailFlag = true;
    $(element).removeClass("is-invalid");
    $(element).addClass("is-valid");
  } else {
    emailFlag = false;
    $(element).removeClass("is-valid");
    $(element).addClass("is-invalid");
  }
}
function checkConfirmPassword(element) {
  if ($("#pass").val() == element.value) {
    cnfrmFlag = true;
    $(element).addClass("is-valid");
    $(element).removeClass("is-invalid");
  } else {
    cnfrmFlag = false;
    $(element).addClass("is-invalid");
    $(element).removeClass("is-valid");
  }
}

var mobileRegex = /^[0-9]+$/;
function checkMobileNumber(element) {
  if (mobileRegex.test(element.value)) {
    if (element.value.length == 10) {
      numFlag = true;
      $(element).removeClass("is-invalid");
      $(element).addClass("is-valid");
    } else {
      numFlag = false;
      $(element).removeClass("is-valid");
      $(element).addClass("is-invalid");
      $(`#${element.id} + .invalid-feedback`).html(
        "Mobile number should only be 10 digits"
      );
    }
  } else {
    numFlag = false;
    $(element).removeClass("is-valid");
    $(element).addClass("is-invalid");
    $(`#${element.id} + .invalid-feedback`).html("Only digits are allowed");
  }
}
function checkFlag() {
  return radioFlag && emailFlag && numFlag && userFlag && passFlag && cnfrmFlag && DOBFlag;
}
function checkDOB() {
  var today = new Date();
  var birthDate = new Date($("#DOB").val());

  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  DOBFlag = false;
  if (birthDate == "Invalid Date") {
    $("#DOB").removeClass("is-valid");
    $("#DOB").addClass("is-invalid");
    $("#DOB ~ .invalid-feedback").html("Enter Date of birth");
  } else if (age < 18) {
    $("#DOB").removeClass("is-valid");
    $("#DOB").addClass("is-invalid");
    $("#DOB ~ .invalid-feedback").html("Your age should be greater than 18");
  } else {
    $("#DOB").removeClass("is-invalid");
    $("#DOB").addClass("is-valid");
    DOBFlag = true;
  }
}
$(document).ready(function () {
  $("#fname,#lname").keyup(function () {
    checkName(this);
  });
  $("#uname").keyup(function () {
    checkUsername(this);
  });
  $("#email").keyup(function () {
    checkEmail(this);
  });
  $("#pass").keyup(function () {
    checkPassword(this);
  });
  $("#pass").blur(function () {
    checkConfirmPassword(cnfrmpass);
  });
  $("#cnfrmpass").keyup(function () {
    checkConfirmPassword(this);
  });
  $("#mobilenumber").keyup(function () {
    checkMobileNumber(this);
  });
});

function checkRadio(){
  if($('#maleGender').prop('checked') || $('#femaleGender').prop('checked') || $('#otherGender').prop('checked')){
    radioFlag = true;
    $(`#otherGender`).addClass("is-valid");
    $(`#otherGender`).removeClass("is-invalid");
  }
  else{
    $(`#otherGender`).removeClass("is-valid");
    $(`#otherGender`).addClass("is-invalid");
    radioFlag = false;
  }
}

$(document).ready(function(){
  $("#registrationForm").submit(function (ev) {
    checkDOB();
    checkRadio();
    if (!checkFlag()) {
      ev.preventDefault();
    }
  });
});