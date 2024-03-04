package chanolja.server.chanolja_mng.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class cntMasterMng {

    @GetMapping("/chanolja_mng/master_mng")
    public void index(){
        this.dash();
    }

    @GetMapping("/chanolja_mng/master_mng/dash")
    public java.lang.String dash(){
        return "/master/dash";
    }
}
