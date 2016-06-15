$(function() {

    ////Hide footer on explore page
    //var url = document.location.href;
    //
    //if (url.toLowerCase().indexOf('typo.app:8000/explore') > -1) {
    //    $('.footer').hide();
    //} else {
    //    $('.footer').show();
    //}


    $('div.alert').delay(3000).slideUp(300); //hide flashing messages

    /// Load fonts
    function loadFonts(families) {
        WebFont.load({
            google: {
                families: families
            }
        });
    }

    $.ajax({
        url: "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCEP0rUUCLVL3WrsKDs08XDc7D4cLYl6Zo",
        success: function(response){
            console.log(response)
            initFonts(response.items);
        }
    });

    function initFonts(fonts){
        var $selects = $(".font-selector select");
        var addFont= function(font, i){
            var family = $('<option class="family-option" style="font-family: '+ font.family + '" value="'+font.family+'">'+font.family+"</option>");
            $selects.each(function(){
                $(this).append(family.clone());
                i%100 == 0 ? console.log(fonts[i].family) : 1;
            });
        }

        var families = [];
        for(var i = 0; i < fonts.length; i++){
            addFont(fonts[i], i);
            families.push(fonts[i].family);

        }
        $selects.chosen();


        var $triggers = $("");
        var $target = $(".headline");
        $(document).on('click', ".active-result", function(e){
            console.log(e);
            var fam = e.currentTarget.textContent;
            var $parent = $(e.currentTarget).parents('.font-selector');
            var $target = $("."+$parent.data('target'));
            $target.css('font-family', fam);
            loadFonts([fam]);
        });


        $(".font-selector").trigger("chosen:updated");
    }

    //Display the fonts
    function getPresentFonts(){
        var fams = [];
        $('[data-font]').each(function(e){
           var $this = $(this);
            var fam = $this.data('font');
            $this.css('font-family', fam);
            console.log(fam)
            fams.push(fam);
        });
        loadFonts(fams);
    }
    getPresentFonts();
});