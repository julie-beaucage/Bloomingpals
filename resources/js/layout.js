
$(document).ready(function () {
    var img = document.getElementById("background_img");
    var color = document.getElementById("background_color");

    img.onload = function () {
        var rgb = getAverageRGB(img);
        color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
    }

    var rgb = getAverageRGB(img);
    color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
});
function getAverageRGB(img) {
    var canvas = document.createElement('canvas'),
        context = canvas.getContext && canvas.getContext('2d'),
        data, width, height, i = -4, length, rgb = { r: 0, g: 0, b: 0 }, count = 0;

    height = canvas.height = img.naturalHeight || img.offsetHeight || img.height;
    width = canvas.width = img.naturalWidth || img.offsetWidth || img.width;

    context.drawImage(img, 0, 0);

    try {
        data = context.getImageData(0, height - 5, width, 1);
    } catch (e) {
        return { r: 0, g: 0, b: 0 };
    }

    length = data.data.length;
    while ((i += 20) < length) {
        count++;
        rgb.r += data.data[i];
        rgb.g += data.data[i + 1];
        rgb.b += data.data[i + 2];
    }

    rgb.r = ~~(rgb.r / count);
    rgb.g = ~~(rgb.g / count);
    rgb.b = ~~(rgb.b / count);

    return rgb;
}