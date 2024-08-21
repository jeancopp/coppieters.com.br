import '@styles/App.scss';

import {useState} from "react";
import Button from 'react-bootstrap/Button';

export default function () {
  const [count, setCount] = useState(0)
  const handleClick = () => {
    setCount((count) => count + 1);
  };

  return (
    <>
      <div>
        <Button onClick={handleClick}>
          Botão foi clicado {count} vez(es)
        </Button>
      </div>
    </>
  );
}