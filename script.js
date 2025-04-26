$(document).ready(function () {
  lockerno = "";
  isLocked = false;
  $(".locker").click(function (e) {
    e.preventDefault();
    $(".modal").css("display", "block");
    lockerno = $(this).attr("value");
    if ($(this).hasClass("locked")) {
      isLocked = true;
    } else {
      isLocked = false;
    }
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
    if (isLocked) {
      $.ajax({
        type: "POST",
        url: "getlocker.php",
        data: {
          locker_no: lockerno,
        },
        success: function (response) {
          pin = JSON.parse(response).pin;
          id = JSON.parse(response).id;
          if (pin == lockerpin) {
            $.ajax({
              type: "POST",
              url: "updatelog.php",
              data: {
                id: id,
              },
              success: function (response) {
                if (response == "DONE") {
                  alert("Locker Unlocked!");
                  $("#locker-" + lockerno).removeClass("locked");
                  closeModal();
                  location.reload(true);
                } else {
                  alert("cannot be unlocked");
                }
              },
              error: function (response) {
                alert("Error Unlocking Locker");
              },
            });
          } else {
            alert("MAGNANAKAW");
          }
        },
        error: function (response) {},
      });
    } else {
      $.ajax({
        type: "POST",
        url: "log.php",
        data: {
          locker_no: lockerno,
          pin: lockerpin,
        },
        success: function (response) {
          $("#locker-" + lockerno).addClass("locked");
          closeModal();
          location.reload(true);
        },
        error: function (response) {},
      });
    }
  }
});
