import React from "react";
import "./styles.css";

const LabelInput = ({ placeholder, label, onChange }) => {
  return (
    <div className="flex column label-button-container">
      <label>{label}</label>
      <input
        className={"rounded-border"}
        type="text"
        placeholder={placeholder}
        onChange={onChange}
      />
    </div>
  );
};

export default LabelInput;
