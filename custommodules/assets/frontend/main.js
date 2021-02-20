$(document).ready(function () {
    /*
    if(pagecount != undefined) {
        const countUp = new CountUp('pagecount', pagecount);
        if (!countUp.error) {
          countUp.start(function() {
                $('#pagecount').addClass('dark');
          });
        } else {
          console.error(countUp.error);
        }
    } else {
        console.log("pagecount not defined!");
    }

    function addGetParamTheme() {
        var links = $("a");
        console.log(links);
        links.each(function() {
            var href = $(this).attr("href");
            if(href.includes("theme=dark")) {
            } else {
                $(this).attr("href", href + "?theme=dark");
            }
        });
    }

    function removeGetParamTheme() {
        var links = $("a");
        links.each(function() {
            var href = $(this).attr("href");
            if(href.includes("theme=dark")) {
                var newhref = href.replace("?theme=dark", "");
                $(this).attr("href", newhref);
            } else {
            }
        });
    }



    if (window.location.search.substr(1).includes("dark")) {
        $("body").addClass("dark-theme");
    }

    if (window.location.search.substr(1).includes("dark")) {
        $(".m_switch_check:checkbox").prop("checked", true);
        addGetParamTheme();
    } else {
        $(".m_switch_check:checkbox").prop("checked", false);
    }

    $(".m_switch_check:checkbox").mSwitch({
        onRendered: function(elem) {},
        onRender: function(elem) {},
        onTurnOn: function(elem) {
            if (!$("body").hasClass("dark-theme")) {
                $("body").addClass("dark-theme");
                history.pushState({
                    page: 0
                }, "title 1", "?theme=dark");
                addGetParamTheme();
            }
            return true;
        },
        onTurnOff: function(elem) {
            if ($("body").hasClass("dark-theme")) {
                $("body").removeClass("dark-theme");
                history.pushState({
                    page: 1
                }, "title 1", "?theme=light");
                removeGetParamTheme()
            }
            return true;
        }
    });
    */
});