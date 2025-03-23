import NavBar from "./components/NavBar";
import SubNavBar from "./components/SubNavBar";
import { Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Signup from "./pages/Signup";

function App() {
  return (
    <>
      <NavBar />
      <SubNavBar
        baseLink="/login"
        link1={"/hello"}
        text1={"Hello"}
        link2="/"
        text2="nice"
        link3="/signup"
        text3="Signup"
      />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/signup" element={<Signup />} />
        <Route path="/login" element={<Login />} />
      </Routes>
    </>
  );
}

export default App;
