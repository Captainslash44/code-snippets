import React from "react";
import SubNavBar from "../../components/SubNavBar";
import { Routes, Route } from "react-router-dom";
import { request } from "../../remote/axios";
import { useState, useEffect } from "react";

const Home = () => {
  const [languages, setLang] = useState();
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const retrieveLanguages = async () => {
      setLoading(true);
      try {
        const response = await request({
          method: "POST",
          route: "http://localhost:8000/api/user/getlanguages",
          headers: {
            Authorization: "Bearer " + localStorage.getItem("access_token"),
          },
        });
        setLang(response);
      } catch (error) {
        console.log("error");
      } finally {
        setLoading(false);
      }
    };
    retrieveLanguages();
  }, []);
  console.log(languages);

  return loading ? (
    <h1>loading</h1>
  ) : (
    <>
      <SubNavBar baseLink={"/"} languages={languages} />
      <Routes>
        <Route path="/:lanugage" element={<h1>1</h1>} />
      </Routes>
    </>
  );
};

export default Home;
