import axios from "axios";

const  baseURL = import.meta.env.VITE_API_URL;

const apiService = axios.create({
    baseURL,
});

export const fetchAllCategory = async () => {
    try{
        const response = await apiService.get("/category");
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
};

