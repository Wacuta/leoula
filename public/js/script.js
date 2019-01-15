
let input = $('#search');
let suggest = $('#search + .suggestion');

if(input) {
    input.on({
        keyup : function () {
            let val = input.val();
            if(!val || val.length > 1)
                autocomplete(val);
            else
                closeSuggest();
        },
        click : function () {
            let val = input.val();
            if(!val || val.length > 1)
                suggest.show();
            else
                closeSuggest();
        }
    });

}

$(document).click((e) => {
    if (!$(e.target).is(input)) {
        closeSuggest();
    }
});

const autocomplete = async function (value) {
    let response = await fetch('/api/mots/search?mot='+value, {
        method: "POST"
    });
    if(response.ok) {
        let data = await response.json()
        suggest.show();
        $('#search + .suggestion .suggestion-result').remove();
        data.forEach(function (mot) {
            // console.log(mot)
            let item = $('<span class="suggestion-result">'+ mot.libelle +'</span>');
            item.on('click', function(){
                input.val(mot.libelle);
                closeSuggest();
                window.location.replace("/"+mot.libelle);
            })
            suggest.append(item);
        });
    } else {
        console.error("Retour du reserver : ", response.status)
    }
}

function closeSuggest() {
    suggest.hide();
}