<!DOCTYPE html>
<html>
    <head>
        <title>حساب کاربری</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    </head>
    <body dir="rtl">
    @yield('show')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(".nav ul li").click(function() {
            $(this)
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        const tabBtn = document.querySelectorAll(".nav ul li");
        const tab = document.querySelectorAll(".tab");

        function tabs(panelIndex) {
            tab.forEach(function(node) {
                node.style.display = "none";
            });
            tab[panelIndex].style.display = "block";
        }
        tabs(0);

        let bio = document.querySelector(".bio");
        const bioMore = document.querySelector("#see-more-bio");
        const bioLength = bio.innerText.length;

        function bioText() {
            bio.oldText = bio.innerText;

            bio.innerText = bio.innerText.substring(0, 100) + "...";
            bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
        }
        //        console.log(bio.innerText)

        bioText();

        function addLength() {
            bio.innerText = bio.oldText;
            bio.innerHTML +=
                "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
            document.getElementById("see-less-bio").addEventListener("click", () => {
                document.getElementById("see-less-bio").style.display = "none";
            });
        }
        if (document.querySelector(".alert-message").innerText > 9) {
            document.querySelector(".alert-message").style.fontSize = ".7rem";
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
    </body>
</html>
