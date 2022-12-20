<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>

<script type="48632658e8f27a523ee43f01-text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>

<script src="{{ asset('js/osahan.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('js/rocket-loader.min.js') }}" data-cf-settings="48632658e8f27a523ee43f01-|49" defer=""></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76af6bd18c369ba0","version":"2022.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>

<script type="text/javascript">
    $("document").ready(function() {
        $(".loader").fadeOut("slow");

    });

    //    $(window).load(function() {
    //         console('sada');
    //         $(".loader").fadeOut("slow");
    //     });



    // -------------------Common ajax function------------------


    function getDataByAjax(url, peram, method, msg) {

        $.ajax({
            url: url,
            type: method,
            data: peram,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(resp) {

                if (resp.success == 'done') {
                    if (msg != '') {
                        showMsg(msg);
                    }

                } else if (resp.success == 'diff') {
                    if (resp.msg != '') {
                        showError(resp.msg);
                    }
                } else {
                    showError('Data processing error, Please try sometime.');
                }
                $('.loader').hide();
            }
        })
    }

    function getDataByAjaxWithoutLoader(url, peram, method, msg) {

        $.ajax({
            url: url,
            type: method,
            data: peram,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            success: function(resp) {

                if (resp.success == 'done') {
                    if (msg != '') {
                        showMsg(msg);
                    }


                } else {
                    if (resp.msg != '') {
                        showError(resp.msg);
                    }
                }
              
            }
        })
        
       
    }
    function getDataByAjaxWithoutLoaderAppend(url, peram, method, msg) {

        $.ajax({
            url: url,
            type: method,
            data: peram,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           
            success: function(resp) {

                if (resp.success == 'done') {
                    if (msg != '') {
                        showMsg(msg);
                    }


                } else {
                    if (resp.msg != '') {
                        showError(resp.msg);
                    }
                }
              
            }
        })
        
       
    }



    function getDataByAjaxImage(url, peram, method, msg) {

        $.ajax({
            url: url,
            type: method,
            data: peram,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $('.loader').show();
            },
            success: function(resp) {

                if (resp.success == 'done') {
                    showMsg(msg);


                } else {
                    showError('Data processing error, Please try sometime.');
                }
                $('.loader').hide();
            }
        })
    }

    function checkValidation(key) {

        var input = $('#' + key).val();
        if (input == '') {
            $('#' + key).addClass('is-invalid');
            return false;
        } else {
            $('#' + key).removeClass('is-invalid');
            return true;
        }

    }

    function showError(msg) {
        $('#error').html(msg);
        $('#mbsmessageerror').show();


        setTimeout(function() {
            $("#mbsmessageerror").hide();
        }, 4000);


    }

    function showMsg(msg) {

        $('#success').html(msg);
        $('#mbsmessagesucesss').show();

        setTimeout(function() {
            $("#mbsmessagesucesss").hide();
        }, 4000);

    }







    // ------------------------------------------------------
</script>


<script>
    $('.blur-bg, nav').click(function() {
        $('.blur-bg').hide();
        $('nav').css('z-index', 'unset');
    });

    function autocomplete(inp, arr) {
        var value = '';
        var arrIds = [];
        inp.addEventListener("input", function(e) {
            value = this.value;
            if (value != '') {
                $('.blur-bg').show();
                $('nav').css('z-index', '9999');
            } else {
                $('.blur-bg').hide();
                $('nav').css('z-index', 'unset');
            }
        });



        $.ajax({
            url: '{{ route("users.suggestion") }}',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(resp) {
                arr = resp.data;
                arrIds = resp.allIds;



            }
        })
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    var sp = arr[i].split(' <span ');
                    b = document.createElement("DIV");
                    b.id = arrIds[i];
                    /*make the matching letters bold:*/
                    b.innerHTML = "<i style='margin-right: 8px;font-size: 14px;' class='fa fa-search'></i>";
                    b.innerHTML += "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + sp[0] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        var id = $(this).attr('id');
                        window.location.href = "/account/profile/" + id;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }


    /*An array containing all the country names in the world:*/
    var countries = [];



    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);
</script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>


</html>