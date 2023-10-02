import axios from "axios";

const  baseURL = import.meta.env.VITE_API_URL;

const apiService = axios.create({
    baseURL,
});

export const fetchAllPlant = async () => {
    try{
        const response = await apiService.get("/plant");
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
};

export const fetchPlant = async (id) => {
    try{
        const response = await apiService.get("/plant/" + id);
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
}

