import React from "react";
import "./styles.css";

const Button = ({ text, color, onClick, textColor, className, imageURL }) => {
  return (
    <button
      className={`flex justify-center align-center cta-bg rounded-border ${textColor} ${className}`}
      onClick={onClick}
      text={textColor}
    >
      {text}
      <img src={imageURL} alt="" />
    </button>
  );
};

export default Button;
