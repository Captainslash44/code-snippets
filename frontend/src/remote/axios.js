import axios from "axios";

axios.defaults.baseURL = ""; // base url of the server
axios.defaults.headers = {
  "Content-Type": "application/json",
};

export const request = async ({ method, route, body, headers }) => {
  try {
    const response = await axios.request({
      method, // => method: method,
      url: route,
      data: body,
      headers,
    });

    return response.data;
  } catch (error) {
    return {
      error: true,
      message: error.message,
    };
  }
};
