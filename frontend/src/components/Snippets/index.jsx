import React from "react";
import { useParams } from "react-router-dom";
import { request } from "../../remote/axios";

const Snippets = () => {
  let { languageName } = useParams();

  return <div>Snippets</div>;
};

export default Snippets;
