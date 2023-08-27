import axios from "axios";

const baseURL = import.meta.env.VITE_API_URL;

const apiService = axios.create({
    baseURL,
});

export const registerClient = async (nome, email, senha) => {
    try {
        const response = await apiService.post("/client", {
            nome: nome,
            email: email,
            senha: senha,
        });
        return response.data;
    } catch (err) {
        console.error('Error:', err);
        throw err;
    }
};

export const loginClient = async (email, senha) => {
    try {
        const response = await apiService.post("/loginClient", {
            email: email,
            senha: senha,
        });
        return response.data;
    } catch (err) {
        console.error('Error:', err);
        throw err;
    }
};
