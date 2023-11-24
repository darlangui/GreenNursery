import axios from "axios";

const baseURL = import.meta.env.VITE_API_URL;

const apiService = axios.create({
    baseURL,
});


export const setAuthToken = (token) => {
    if (token) {
        apiService.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    } else {
        delete apiService.defaults.headers.common['Authorization'];
    }
}

export default apiService;