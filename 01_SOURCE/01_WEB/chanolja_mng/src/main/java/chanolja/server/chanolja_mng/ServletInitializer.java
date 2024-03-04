package chanolja.server.chanolja_mng;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.builder.SpringApplicationBuilder;
import org.springframework.boot.web.servlet.support.SpringBootServletInitializer;

public class ServletInitializer extends SpringBootServletInitializer {

	@Override
	protected SpringApplicationBuilder configure(SpringApplicationBuilder application) {
		return application.sources(ChanoljaMngApplication.class);
	}

	public static void main(String[] args){
		SpringApplication.run(ChanoljaMngApplication.class, args);
	}
}
