// Nav mobile version animation

$(document).ready(function () {
  $(".icon-mobile-nav.open").click(function () {
    $(".nav-list").css("display", "flex");
    $(".icon-mobile-nav.open").css("display", "none");
    $(".icon-mobile-nav.close").css("display", "flex");
  });

  $(".icon-mobile-nav.close").click(function () {
    $(".nav-list").css("display", "none");
    $(".icon-mobile-nav.close").css("display", "none");
    $(".icon-mobile-nav.open").css("display", "block");
  });

  $(".dash-edit-btn").click(function () {
    $(".dash-edit").css("display", "block");
    $(".dash-grid-1").css("display", "none");
  });

  $(".dash-stat-btn").click(function () {
    $(".dash-grid-1").css("display", "grid");
    $(".dash-edit").css("display", "none");
  });
});
