import axios from "axios";


axios.defaults.baseURL = `https://api.whatsapp.com`;
axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.headers.common["Accept"] = "application/json";

export default axios;
