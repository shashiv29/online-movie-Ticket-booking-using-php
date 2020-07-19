$(function() {
    $("#upload").bind("click", function() {
        //Get reference of FileUpload.
        var fileUpload = $("#fileUpload")[0];

        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof(fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();

                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function(e) {

                    //Initiate the JavaScript Image object.
                    var image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function() {

                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height == 400 && width == 360) {
                            alert("Height and Width are 400 and 360!");
                            return false;
                        }
                        alert("Height and Width are 400 and 360!");
                        return true;
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
    });
});





$(function() {
    $("#upload").bind("click", function() {
        //Get reference of FileUpload.
        var fileUpload = $("#bannerUpload")[0];

        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof(fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();

                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function(e) {

                    //Initiate the JavaScript Image object.
                    var image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function() {

                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height == 400 || width == 1200) {
                            alert("Height and Width are 400 and 1200!");
                            return false;
                        }
                        alert("Height and Width are 400 and 1200!");
                        return true;
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
    });
});


$(function() {
    $("#upload").bind("click", function() {
        //Get reference of FileUpload.
        var fileUpload = $("#cinemaUpload")[0];

        //Check whether the file is valid Image.
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {

            //Check whether HTML5 is supported.
            if (typeof(fileUpload.files) != "undefined") {
                //Initiate the FileReader object.
                var reader = new FileReader();

                //Read the contents of Image File.
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function(e) {

                    //Initiate the JavaScript Image object.
                    var image = new Image();

                    //Set the Base64 string return from FileReader as source.
                    image.src = e.target.result;
                    image.onload = function() {

                        //Determine the Height and Width.
                        var height = this.height;
                        var width = this.width;
                        if (height == 400 || width == 1200) {
                            alert("Height and Width are 400 and 1200!");
                            return false;
                        }
                        alert("Height and Width are 400 and 1200!");
                        return true;
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
            return false;
        }
    });
});