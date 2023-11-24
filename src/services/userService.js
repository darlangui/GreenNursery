import apiService, {setAuthToken} from "@/services/apiService";

export const registerUser = async (name, email, password) => {
    try {
        const response = await apiService.post("/v1/user", {
            name: name,
            email: email,
            password: password,
        });
        return response.data;
    } catch (err) {
        console.error('Error:', err);
        throw err;
    }
};

export const loginUser = async (email, password) => {
    try {
        const response = await apiService.post("/auth/login", {
            email: email,
            password: password,
        })
        const token = response.data.access_token;
        localStorage.setItem("accessToken", token);
        setAuthToken(token);
        return response.data;
    } catch (err) {
        console.error('Error:', err);
        throw err;
    }
};
