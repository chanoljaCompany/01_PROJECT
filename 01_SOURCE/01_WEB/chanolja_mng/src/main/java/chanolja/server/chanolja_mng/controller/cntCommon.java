package chanolja.server.chanolja_mng.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class cntCommon {

  @GetMapping("/chanolja_mng/common")
  public void index(){
      this.login();
  }

  @GetMapping("/chanolja_mng/common/header")
  public String header(){
    return "header_pc";
  }

  @GetMapping("/chanolja_mng/common/login")
  public java.lang.String login(){
    return "/common/login";
  }


}
