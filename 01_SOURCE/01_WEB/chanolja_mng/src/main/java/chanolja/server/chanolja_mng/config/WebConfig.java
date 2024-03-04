package chanolja.server.chanolja_mng.config;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.ResourceHandlerRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

@Configuration
public class WebConfig implements WebMvcConfigurer {
    @Override
    public void addResourceHandlers(ResourceHandlerRegistry registry) {
        // 예를 들어, "/static/lib/" 경로에 대한 리소스 핸들러를 추가하는 방법
        registry.addResourceHandler("/chanolja_mng/static/img/**")
                .addResourceLocations("classpath:/static/img/");

        registry.addResourceHandler("/chanolja_mng/static/css/**")
                .addResourceLocations("classpath:/static/css/");

        registry.addResourceHandler("/chanolja_mng/static/js/**")
                .addResourceLocations("classpath:/static/js/");

        registry.addResourceHandler("/chanolja_mng/static/lib/**")
                .addResourceLocations("classpath:/static/lib/");
    }
}