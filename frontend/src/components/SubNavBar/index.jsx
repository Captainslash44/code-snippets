import React from "react";
import "./styles.css";
import { Link, useLocation } from "react-router-dom";

const SubNavBar = ({ baseLink, languages }) => {
  const location = useLocation();
  const baseUrl = baseLink;
  const CustomLink = ({ text, link, id }) => {
    const currentPath = location.pathname;
    return (
      <li key={id} className={currentPath === baseUrl + link ? "active" : ""}>
        <Link to={baseUrl + link}>{text}</Link>
      </li>
    );
  };

  return (
    <nav className={`languages justify-start poppins`}>
      <ul className="flex">
        {languages.map((language) => (
          <CustomLink
            text={language.name}
            link={language.name}
            id={language.id}
          ></CustomLink>
        ))}
      </ul>
    </nav>
  );
};

export default SubNavBar;
