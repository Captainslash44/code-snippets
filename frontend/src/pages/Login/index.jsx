import React from "react";
import Button from "../../components/Button";
import LabelInput from "../../components/Input";
import "./styles.css";

const Login = () => {
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
          <Button text="Login" />
        </footer>
        <p>
          Don't have an account? <a href="/signup">Signup</a>
        </p>
      </div>
    </div>
  );
};

export default Login;
