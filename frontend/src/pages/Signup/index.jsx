import React from "react";
import Button from "../../components/Button";
import LabelInput from "../../components/Input";
import "./styles.css";
import { request } from "../../remote/axios";
import { useState } from "react";

const Signup = () => {
  const [confirmedPass, setPass] = useState();
  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
  });

  const register = async () => {
    if (form.password != confirmedPass) {
      alert("passwords should match");
      return;
    }

    const response = await request({
      method: "POST",
      route:
        "http://13.38.109.103/var/www/html/code-snippets/backend/api/guest/signup",
      body: form,
    });

    console.log(response);
  };

  return (
    <div className="flex justify-center align-center full-height">
      <div className="register-form flex column space-between primary-bg rounded-border align-center box-shadow-blue pl">
        <header>
          <h2>Register</h2>
        </header>
        <div className="signup-input-container flex column space-between align-center">
          <LabelInput
            placeholder="Full Name"
            label="Full Name"
            onChange={(e) => {
              setForm({ ...form, name: e.target.value });
            }}
          />
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
          <LabelInput
            placeholder="Confirm Password"
            label="Confirm Password"
            onChange={(e) => {
              setPass(e.target.value);
            }}
          />
        </div>

        <Button text="Signup" onClick={register} />
        <footer>
          <p>
            Already have an account? <a href="./login">Sign in</a>
          </p>
        </footer>
      </div>
    </div>
  );
};

export default Signup;
