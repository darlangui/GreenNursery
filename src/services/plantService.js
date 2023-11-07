import apiService from "@/services/apiService";

export const fetchAllPlant = async () => {
    try{
        const response = await apiService.get("/v1/plant");
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
};

export const fetchPlant = async (id) => {
    try{
        const response = await apiService.get("/v1/plant/" + id);
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
}

