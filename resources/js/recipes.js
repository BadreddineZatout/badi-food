import axios from "axios";

const getRecipes = (url) => {
    axios.post(url).then((response) => {
        console.log(response.data);
    });
};

