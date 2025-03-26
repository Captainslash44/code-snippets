import React from "react";
import Button from "../../components/Button";
import LabelInput from "../../components/Input";
import "./styles.css";
import { useState } from "react";
import { request } from "../../remote/axios";
import { useNavigate } from "react-router-dom";

const Login = () => {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  const login = async () => {
    const response = await request({
      method: "POST",
      route:
        "http://13.38.109.103/var/www/html/code-snippets/backend/api/guest/login",
      body: form,
    });

    if (response.success) {
      localStorage.setItem("id", response.user.id);
      localStorage.setItem("name", response.user.name);
      localStorage.setItem("access_token", response.user.token);
      navigate("/");
    } else {
      alert("wrong credentials");
    }
  };

  return (
    <div className="flex align-center justify-center full-height">
      <div className="login-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header className="flex justify-center">
          <h2>Login</h2>
        </header>
        <div className="input-container space-between flex column align-center">
          <LabelInput
            placeholder="Email"
            label="Email"
            onChange={(e) => {
              setForm({ ...form, email: e.target.value });
            }}
          />
          <LabelInput
            placeholder="Password"
            label="Password"
            onChange={(e) => {
              setForm({ ...form, password: e.target.value });
            }}
          />
        </div>
        <footer className="flex column align-center space-between">
          <Button text="Login" onClick={login} />
        </footer>
        <p>
          Don't have an account? <a href="/signup">Signup</a>
        </p>
      </div>
    </div>
  );
};

export default Login;
