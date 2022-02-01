import axios from "axios";
import $ from "jquery";

$(document).ready(function () {
    $("#load-data").attr("offset", 0);
    $("#load-data").attr("limit", 3);
    var url = "{{ route('recipes', [':offset', ':limit']) }}";
    url = url.replace(":offset", 1);
    url = url.replace(":limit", 3);
    getRecipes(url);
});

const getRecipes = (url) => {
    axios.post(url).then((response) => {
        console.log(response.data);
    });
};
