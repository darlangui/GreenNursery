import apiService from "@/services/apiService";

export const fetchAllCategory = async () => {
    try{
        const response = await apiService.get("/v1/category");
        return response.data;
    } catch(err){
        console.error('Error:', err)
        throw err;
    }
};