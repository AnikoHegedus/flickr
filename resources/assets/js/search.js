$(document).ready(function () {

//$("#search").click(function () {

//alert($("#keyword").val());
        var endpoint = 'https://api.flickr.com/services/rest/?&method=flickr.photos.search&format=json&nojsoncallback=1';
        var tags = "horse";
        var api_key = "57f694132e4714c29a64c9af890b124e"
        var per_page = 2;
        var url = endpoint + "&api_key=" + api_key + "&tags=" + tags + "&per_page=" + per_page;
        var headers = {
            "Content-Type": "application/x-www-form-urlencoded",
            "Accept": "application/x-www-form-urlencoded"
        }

        $.ajax({
            method: "get",
            headers: headers,
            url: url,
            success: function (response) {
                var farmId = response.photos.photo[0].farm;
                var serverId = response.photos.photo[0].server;
                var id = response.photos.photo[0].id;
                var secret = response.photos.photo[0].secret;
            //  https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}.jpg
                $(".pic").append('<img src="https://farm' + farmId + '.staticflickr.com/' + serverId + '/' + id + '_' + secret + '.jpg"/>');
            },
            error: function (error) {
                $("#h3").append(error);
            }
        });
    
   // });

   
});