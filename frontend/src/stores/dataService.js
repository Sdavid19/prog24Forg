import Axios from 'axios';

const instance = Axios.create({
    baseURL : 'http://192.168.173.167:8000/api',
    headers: {
        'Content-type' : 'application/json'
    }
});

export default instance;

