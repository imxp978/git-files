import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://tsaochun.byethost5.com/backend/controllers',
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json'
    },
    mode: 'cors'
});

export default axiosInstance;