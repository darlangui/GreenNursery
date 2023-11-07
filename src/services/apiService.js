import axios from "axios";

const baseURL = import.meta.env.VITE_API_URL;

const apiService = axios.create({
    baseURL,
});
export default apiService;

