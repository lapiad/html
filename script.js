$(document).ready(function () {
  lockerno = "";
  $(".locker").click(function (e) {
    e.preventDefault();
    $(".modal").css("display", "block");
    lockerno = $(this).attr("value");
  });

  $(".close").click(function (e) {
    closeModal();
    e.preventDefault();
  });

  $("#locker-modal").click(function (e) {
    e.preventDefault();
    lockerpin = $("#lockerPin").val();
    lockUnclock(lockerpin);
  });

  function closeModal() {
    $(".modal").css("display", "none");
  }

  function lockUnclock(lockerpin) {
    $.ajax({
      type: "POST",
      url: "log.php",
      data: {
        locker_no: lockerno,
        pin: lockerpin,
      },
      dataType: "json",
      success: function (response) {
        $(".locker").addClass("locked");
        closeModal();
      },
    });
  }
});
