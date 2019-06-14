var base_url = 'http://sebuahlabs.online/'

/* Home Page Section */
// UMUM
var getUmum = function (page) {
    $.ajax({
        url: base_url+"Home/getUmum",
        type: 'GET',
        data: {
            page: page
        }
    }).done(function (response) {
        var dataUmum = jQuery.parseJSON(response)

        document.getElementById("app_umum").innerHTML = ` ${dataUmum.map(app_umum).join('')} `
                
        $('#load_umum').data('val', ($('#load_umum').data('val') + 1));
        if (page != 0) {
            scrollUmum();	
        }
    });
};

var scrollUmum = function () {
    $('html, body').animate({
        scrollTop: $('#load_umum').offset().top
    }, 1000);
};

//PILIHAN REDAKSI
var getPilihanRedaksi = function (pagePilihanRedaksi) {
    $.ajax({
        url: base_url+"Home/getPilihanRedaksi",
        type: 'GET',
        data: {
            page: pagePilihanRedaksi
        }
    }).done(function (responsePilihanRedaksi) {
        var dataPilihanRedaksi = jQuery.parseJSON(responsePilihanRedaksi)

        document.getElementById("app_pilihanRedaksi").innerHTML = ` ${dataPilihanRedaksi.map(app_pilihanRedaksi).join('')} `
                
        $('#load_pilihanRedaksi').data('val', ($('#load_pilihanRedaksi').data('val') + 1));
        if (pagePilihanRedaksi != 0) {
            scrollPilihanRedaksi();	
        }
    });
};

var scrollPilihanRedaksi = function () {
    $('html, body').animate({
        scrollTop: $('#load_pilihanRedaksi').offset().top
    }, 1000);
};

//SPECIAL
var getSpecial = function (page) {
    $.ajax({
        url: base_url+"Home/getSpecial",
        type: 'GET',
        data: {
            page: page
        }
    }).done(function (response) {
        var dataSpecial = jQuery.parseJSON(response)

        document.getElementById("app_Special").innerHTML = ` ${dataSpecial.map(app_Special).join('')} `
                
        $('#load_special').data('val', ($('#load_special').data('val') + 1));
        if (page != 0) {
            scrollSpecial();	
        }
    });
};

var scrollSpecial = function () {
    $('html, body').animate({
        scrollTop: $('#load_special').offset().top
    }, 1000);
};

//INDEKS BERITA
var getIndeksBerita = function (page) {
    $.ajax({
        url: base_url+"Home/getIndeksBerita",
        type: 'GET',
        data: {
            page: page
        }
    }).done(function (response) {
        var dataIndeksBerita = jQuery.parseJSON(response)

        document.getElementById("app_indeksBerita").innerHTML = ` ${dataIndeksBerita.map(app_indeksBerita).join('')} `
                
        $('#load_indeksBerita').data('val', ($('#load_indeksBerita').data('val') + 1));
        if (page != 0) {
            scrollIndeksBerita();	
        }
    });
};

var scrollIndeksBerita = function () {
    $('html, body').animate({
        scrollTop: $('#load_indeksBerita').offset().top
    }, 1000);
};
/* End of Home Page */

/* Viral Section */
// VIral
var getViral = function (page, sub_page) {
    $.ajax({
        url: base_url+"Viral/getViral",
        type: 'GET',
        data: {
            page: page,
            sub_page: sub_page
        }
    }).done(function (response) {
        var dataViral = jQuery.parseJSON(response)

        document.getElementById("app_viral").innerHTML = ` ${dataViral.map(app_viral).join('')} `
                
        $('#load_viral').data('val', ($('#load_viral').data('val') + 1));
        if (page != 0) {
            scrollViral();	
        }
    });
};

var scrollViral = function () {
    $('html, body').animate({
        scrollTop: $('#load_viral').offset().top
    }, 1000);
};
/* End of Viral Section */

/* Opini Section */
// opini
var getOpini = function (page, sub_page) {
    $.ajax({
        url: base_url+"Opini/getOpini",
        type: 'GET',
        data: {
            page: page,
            sub_page: sub_page
        }
    }).done(function (response) {
        var dataOpini = jQuery.parseJSON(response)

        document.getElementById("app_opini").innerHTML = ` ${dataOpini.map(app_opini).join('')} `
                
        $('#load_opini').data('val', ($('#load_opini').data('val') + 1));
        if (page != 0) {
            scrollOpini();	
        }
    });
};

var scrollOpini = function () {
    $('html, body').animate({
        scrollTop: $('#load_opini').offset().top
    }, 1000);
};
/* End of Opini Section */

/* Unik Section */
// unik
var getUnik = function (page, sub_page) {
    $.ajax({
        url: base_url+"Unik/getUnik",
        type: 'GET',
        data: {
            page: page,
            sub_page: sub_page
        }
    }).done(function (response) {
        var dataUnik = jQuery.parseJSON(response)

        document.getElementById("app_unik").innerHTML = ` ${dataUnik.map(app_unik).join('')} `
                
        $('#load_unik').data('val', ($('#load_unik').data('val') + 1));
        if (page != 0) {
            scrollUnik();	
        }
    });
};

var scrollUnik = function () {
    $('html, body').animate({
        scrollTop: $('#load_unik').offset().top
    }, 1000);
};
/* End of Unik Section */

/* Sport Section */
// sport
var getSport = function (page, sub_page) {
    $.ajax({
        url: base_url+"Sport/getSport",
        type: 'GET',
        data: {
            page: page,
            sub_page: sub_page
        }
    }).done(function (response) {
        var dataSport = jQuery.parseJSON(response)

        document.getElementById("app_sport").innerHTML = ` ${dataSport.map(app_sport).join('')} `
                
        $('#load_sport').data('val', ($('#load_sport').data('val') + 1));
        if (page != 0) {
            scrollSport();	
        }
    });
};

var scrollSport = function () {
    $('html, body').animate({
        scrollTop: $('#load_sport').offset().top
    }, 1000);
};
/* End of Sport Section */

/* Description Section */
// Comment
var getComments = function (page) {
    $.ajax({
        url: base_url+"Deskripsi/getComments",
        type: 'GET',
        data: {
            page: page
        }
    }).done(function (response) {
        var dataComments = jQuery.parseJSON(response)

        document.getElementById("app_comment").innerHTML = ` ${dataComments.map(app_comment).join('')} `
                
        $('#load_comment').data('val', ($('#load_comment').data('val') + 1));
        if (page != 0) {
            scrollComments();	
        }
    });
};

var scrollComments = function () {
    $('html, body').animate({
        scrollTop: $('#load_comment').offset().top
    }, 1000);
};
/* End of Description Section */

/* Search Section */
// search
var getSearch = function (page, search) {
    $.ajax({
        url: base_url+"Search/getSearch",
        type: 'GET',
        data: {
            page: page,
            search: search
        }
    }).done(function (response) {
        var dataSearch = jQuery.parseJSON(response)

        console.log(dataSearch)

        document.getElementById("app_search").innerHTML = ` ${dataSearch.map(app_search).join('')} `
                
        $('#load_search').data('val', ($('#load_search').data('val') + 1));
        if (page != 0) {
            scrollSearch();	
        }
    });
};

var scrollSearch = function () {
    $('html, body').animate({
        scrollTop: $('#load_search').offset().top
    }, 1000);
};
/* End of Search Section */

/* Lainnya Section */
// foto
var scrollFoto = function () {
    $('html, body').animate({
        scrollTop: $('#load_foto').offset().top
    }, 1000);
};

// Video
var scrollVideo = function () {
    $('html, body').animate({
        scrollTop: $('#load_video').offset().top
    }, 1000);
};
/* End of Lainnya Section */